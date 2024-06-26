<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RequestPassword;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use App\Traits\StorageImageTrait;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\Wishlist;
session_start();
class CustomerController extends Controller
{
    private $customer;
    use StorageImageTrait;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    //check customer login
    public function AuthLogin(){
        $customer_id = session()->get('cus_id');
        if ($customer_id){
           return redirect('/');
        }else {
            return redirect('/dang-nhap')->send();
        }
    }
    //check admin login
    public function AuthLogin1(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    //Admin
    public function index(){
        $this->AuthLogin1();
        $customers = DB::table('tbl_customer')->paginate(5);;
        return view('admin.customer.all_customer', compact('customers'));
    }
    public function edit($id)
    {
        $customer = DB::table('tbl_customer')->where('id', $id)->first();
        return view('admin.customer.edit_customer', compact('customer'));

    }
    public function delete($id){
        $contact = DB::table('tbl_customer')->where('id', $id)->delete();
        DB::table('comments')->where('customer_id', $id)->delete();
        DB::table('wishlists')->where('customer_id', $id)->delete();
        session()->flash('message', 'Xóa Customer thành công !!!');
        return redirect()->route('customer_index');
    }
    public function update($id, Request $request)
    {
        
        $dataCustomer = array();
        $dataCustomer['cus_name'] = $request->cus_name;
        $dataCustomer['cus_email'] = $request->cus_email;
        $dataCustomer['cus_phone'] = $request->cus_phone;
        $dataCustomer['cus_password'] = $request->cus_password;
        $dataCustomer['cus_address'] = $request->cus_address;
        $dataCustomer['updated_at'] = now();
          //Xử lý ràng buộc số điện thoại
       $validator = Validator::make($request->all(), [
        'cus_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    ]);
    if ($validator->fails()) {
        session()->put('message', 'Số điện thoại không hợp lệ vui lòng nhập đúng định dạng số điện thoại');
        return redirect('/customer/edit/'.$id);
    }
        DB::table('tbl_customer')
        ->where('id', $id)->update($dataCustomer);
        session()->put('message', 'Thay đổi thông tin thành công');
        return redirect()->route('customer_index');
    }
    //Clients
    //Đăng nhập Customer
    public function login(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = ($request->customer_password);

        $result = DB::table('tbl_customer')
            ->where('cus_email', $customer_email)
            ->where('cus_password', md5($customer_password))
            ->first();
        if ($result) {
            session()->put('cus_name', $result->cus_name);
            session()->put('cus_id', $result->id);
            session()->put('cus_email', $result->cus_email);
            return redirect('/');
        } else {
            session()->flash('message', 'Tài khoản hoặc Mật khẩu bị sai. Làm ơn nhập lại!!!');
            return redirect('/dang-nhap');
        }
    }
    public function logout(){
        session()->forget('cus_name');
        Session()->forget('cus_id');
        return redirect('/');
    }
    //Lấy ra 1 thông tin khách hàng
    public function account(){
        $this->AuthLogin();
        $customer_id = session()->get('cus_id');
        $edit_customer = DB::table('tbl_customer')->where('id', $customer_id)->first();
        return view('/account')->with('account', $edit_customer);
    }
    //Thay đổi thông tin khách hàng
    public function editCustomer(Request $request){
        if($request->has('file_upload')){
            $file = $request->product_image;
            $ext = $request->product_image->extension();
            //$file_name = $file->getClientoriginalName();
            $file_name = time().'-'.'customer.'.$ext;
            $file->move(public_path('uploads'), $file_name);
            $request->merge(['image' => $file_name]);
        //dd($ext);
        $id = session()->get('cus_id');
        $dataCustomer = array();
        $dataCustomer['cus_name'] = $request->cus_name;
        $dataCustomer['cus_email'] = $request->cus_email;
        $dataCustomer['cus_phone'] = $request->cus_phone;
        $dataCustomer['cus_password'] = $request->cus_password;
        $dataCustomer['cus_address'] = $request->cus_address;
        $dataCustomer['updated_at'] = now();
        $dataCustomer['cus_image'] = $file_name;
        DB::table('tbl_customer')
        ->where('id', $id)->update($dataCustomer);
        session()->put('message', 'Thay đổi thông tin thành công');
        }
        return redirect('/account');
    }
    //Đổi mật khẩu
    public function changePassword(){
    $this->AuthLogin();
    return view('change_password');
    }
    // Xử lý đổi mật khẩu
    public function saveUpdatePassword(RequestPassword $request){
        $id = session()->get('cus_id');
        $edit_customer = DB::table('tbl_customer')->where('id', $id)->first();
        $password = $edit_customer->cus_password;
        if($password == md5($request->current_password)){
            DB::table('tbl_customer')
                ->where('id',$id)->update(['cus_password' => md5($request->new_password)]);
            return redirect('/account')->with('mesage','Mật khẩu đã được cập nhật thành công');
        }
        else{
            session()->put('message', 'Mật khẩu cũ không trùng khớp  vui lòng nhập lại');
            return redirect('change-password');
        }
    }
    public function changeNewPassword(Request $request){
        if($request->new_password == $request->new_password_confirmation){
            DB::table('tbl_customer')
                ->where('cus_email', $request->cus_email)->update(['cus_password' => md5($request->new_password)]);
            return redirect('dang-nhap')->with('mesage','Mật khẩu đã được cập nhật thành công');
        }
        else{
            session()->put('message', 'Mật khẩu nhập lại không trùng khớp  vui lòng nhập lại');
            return redirect('retsetnewpassword/'.$request->cus_email)->with('message', 'Mật khẩu nhập lại không trùng khớp vui lòng nhập lại');

        }
    }
    public function verifyOtp(Request $request){
        $email = $request->email;
        if ($request->otp !== $request->securityCode) {
            // Nếu OTP không chính xác, đặt thông báo lỗi và chuyển hướng người dùng
            $securityCode = $request->securityCode;
           
            session()->put('message', 'OTP không chính xác');
            return view('confirmOTP',compact('securityCode','email'));
        }
        // Nếu OTP chính xác, trả về view với form nhập mật khẩu mới\
        return view('retsetnewpassword', compact('email'));
    }
    
    //Đăng ký thông tin khách hàng
    public function register(Request $request) {
    //Kiểm tra email đã được đăng ký chưa:
    $check = DB::table('tbl_customer')->where('cus_email', $request->customer_email)->first();
    if($check != null){
            session()->put('message', 'Email đã được đăng ký vui lòng sử dụng email khác');
            return redirect('/dang-ky');
    }
    //Xử lý ràng buộc số điện thoại
       $validator = Validator::make($request->all(), [
        'customer_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    ]);
    if ($validator->fails()) {
        session()->put('message', 'Số điện thoại không hợp lệ vui lòng nhập đúng định dạng số điện thoại');
        return redirect('/dang-ky');
    }
    // Nếu dữ liệu hợp lệ, tiếp tục xử lý
       $data = array();
        $data['cus_name'] = $request->customer_name;
        $data['cus_email'] = $request->customer_email;
        if($request->customer_password == $request->password_confirm){
            $data['cus_password'] = md5($request->customer_password);
        }
        else{
            session()->put('message', 'Mật khẩu nhập lại không trùng khớp');
           // return redirect('/dang-ky');
        }
        $data['cus_phone'] = $request->customer_phone;
        $data['cus_address'] = $request->customer_address;
        $data['cus_image'] = 'account.png';
        $data['created_at'] = now();
        DB::table('tbl_customer')->insert($data);
        session()->put('message', 'Đăng ký thành công');
        return redirect('/dang-nhap');
    }
}