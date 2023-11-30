<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    private $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    public function index(){
        $this->AuthLogin();
        $contacts = DB::table('contact')->get();
        return view('admin.contact.all_contact', compact('contacts'));
    }
    public function delete($id){
        $contact = DB::table('contact')->where('id', $id)->delete();
        session()->flash('message', 'Xóa contact thành công !!!');
        return redirect()->route('contact_index');
    }
    //Clients
    public function sendContact(Request $request){
        if($request->con_name ==null && $request->con_email==null){
            $data['con_name'] = session()->get('cus_name');
            $data['con_email'] = session()->get('cus_email');
        }
        else{
            $data['con_name'] = $request->con_name;
            $data['con_email'] = $request->con_email;
        }
      
        $data['con_subject'] = $request->con_subject;
        $data['con_message'] = $request->con_message;
        $data['created_at'] = now();
        DB::table('contact')->insert($data);
        session()->put('message', 'Gửi thông tin thành công. Người quản trị sẽ liên hệ với bạn trong thời gian sớm nhất');
        return redirect('/contact-us');
    }
}
