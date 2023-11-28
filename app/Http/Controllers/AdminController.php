<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    public function index() {
        return view('admin.admin_login');
    }

    public function show_dashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        if ($result) {
            session()->put('admin_name', $result->admin_name);
            session()->put('admin_id', $result->admin_id);
            return redirect()->to('dashboard');
        } else {
            session()->flash('message', 'Tài khoản hoặc Mật khẩu bị sai. Làm ơn nhập lại!!!');
            return redirect()->to('admin');

        }
    }

    public function logout(){
        $this->AuthLogin();
        session()->forget('admin_name');
        session()->forget('admin_id');
        return redirect()->to('admin');
    }

    public function ShowAllAdmins() {
        $this->AuthLogin();
        $admins = DB::table('tbl_admin')->paginate(5);
        return view('admin.admins.all_admin', compact('admins'));
    }
    public function storeAdmin(Request $request) {
        $this->AuthLogin();

        $admins = $this->admins->create([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => md5($request->admin_password),
            'admin_phone' => $request->admin_phone

        ]);
        session()->flash('message', 'Thêm admin phẩm thành công !!!');
        return redirect()->route('admin_create');
    }
    public function Admincreate(){
        $this->AuthLogin();
        return view('admin.admins.add_admin');
    }
    public function editAdmin($id)
    {
        $admins = Admin::where('admin_id',$id)->first();
        return view('admin.admins.edit_admin', compact('admins'));

    }
    public function updateAdmin($id, Request $request) {
        $this->AuthLogin();


        $data = [
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => md5($request->admin_password),
            'admin_phone' => $request->admin_phone

        ];
        DB::table('tbl_admin')->where('admin_id',$id)->update($data);
        session()->flash('message', 'Cập nhập admin thành công !!!');
        return redirect()->route('all_admin');
    }
    public function deleteAdmin($id)
    {
        $admins = Admin::where('admin_id',$id)->delete();
        return redirect()->route('all_admin');

    }
}
