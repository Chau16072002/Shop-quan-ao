<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RequestPassword;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
session_start();
class CustomerController extends Controller
{
    public function __construct()
    {
        //var_dump(44444444444);die();
    }
    //
    public function AuthLogin(){
        $customer_id = session()->get('cus_id');
        if ($customer_id){
           return redirect('/');
        }else {
            return redirect('/dang-nhap')->send();
        }
    }
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
        // if ($edit_customer) {
        //     session()->put()
        // }
        return view('/account')->with('account', $edit_customer);
    }
    //Thay đổi thông tin khách hàng
    public function editCustomer(Request $request){
        $id = session()->get('cus_id');
        $data = array();
        $data['cus_name'] = $request->cus_name;     
        $data['cus_email'] = $request->cus_email;
        $data['cus_phone'] = $request->cus_phone;
        $data['cus_password'] = $request->cus_password;
        $data['cus_address'] = $request->cus_address;
        $get_image = $request->file('cus_image');
        echo ($data['cus_name']);
        echo ($data['cus_email']); 
        echo ($data['cus_phone']);
        echo ($data['cus_password']);
        echo ($data['cus_address']);
            if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/avatar',$new_image);
                $data['cus_image'] = $new_image;
                DB::table('tbl_customer')
                ->where('id', $id)->update($data);
                session()->put('message', 'Thay đổi thông tin thành công');
                return redirect('/account');
            }
            else{
                $data['cus_image'] ='';
                DB::table('tbl_customer')
                ->where('id', $id)->update($data);
                session()->put('message', 'Thay đổi thông tin thành công');
                return redirect('/account');
            }
         
    }
    //Đổi mật khẩu
    public function changePassword(){
    //  var_dump(2222);die();
    $this->AuthLogin();
    return view('change_password');
    }
    // Xử lý đổi mật khẩu
    public function saveUpdatePassword(RequestPassword $request){
        var_dump(1111);die();
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
    //Xử lý gửi mã về số điện thoại
    public function sendVerificationCode(Request $request)
{
    $request->validate([
        'customer_phone' => ['required', 'phone:VN'], // Thay 'VN' bằng mã quốc gia của bạn
    ]);

    $phoneNumber = PhoneNumber::make($request->customer_phone, 'VN'); // Thay 'VN' bằng mã quốc gia của bạn
    $verificationCode = mt_rand(1000, 9999); // Sinh mã ngẫu nhiên (có thể sử dụng gói mở rộng khác để sinh mã phức tạp hơn)

    // Lưu mã xác nhận vào CSDL hoặc nơi nào đó để so sánh sau này
    // Gửi mã xác nhận đến số điện thoại, có thể sử dụng các dịch vụ như Twilio, Nexmo, hoặc gói mở rộng SMS khác
    // (Chú ý: Việc gửi SMS thường yêu cầu tài khoản và cài đặt API key của dịch vụ SMS)

    // Ví dụ: Lưu mã vào session để kiểm tra sau khi người dùng nhập
    $request->session()->put('phone_verification_code', $verificationCode);

    return redirect()->route('verify.phone.form');
}
    //Đăng ký thông tin khách hàng
    public function register(Request $request) {
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
        $data['cus_image'] = null;
        DB::table('tbl_customer')->insert($data);
        session()->put('message', 'Đăng ký thành công');
        return redirect('/dang-nhap');
    }
    protected function create(array $data)
    {
    $user = DB::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password'],
    ]);

    $user->sendEmailVerificationNotification();

    return $user;
    }  
}