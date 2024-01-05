<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    private $comment;
    public function AuthLogin(){
        $customer_id = session()->get('cus_id');
        if ($customer_id){
           return redirect('/');
        }else {
            return redirect('/')->send();
        }
    }
    public function __construct(Comment $comment){
        $this->comment = $comment;
    }
    public function addComment(Request $request){
        $this->AuthLogin();
        $data = [
            'customer_id' => session()->get('cus_id'),
            'product_id' => $request->productid,
            'message' => $request->message
        ];
        $this->comment->create($data);
        return redirect()->to('detail/' . $request->productid);

    }
    }
    