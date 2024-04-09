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
            return redirect('/dang-nhap')->send();
        }
    }
    public function __construct(Comment $comment){
        $this->comment = $comment;
    }
    // public function addComment(Request $request){
    //     $this->AuthLogin();
    //     $data = [
    //         'customer_id' => session()->get('cus_id'),
    //         'product_id' => $request->productid,
    //         'message' => $request->message
    //     ];
    //     $this->comment->create($data);
    //     return redirect()->to('detail/' . $request->productid);

    // }
    public function add(Request $request){
        if(!session()->get('cus_id')){
            return response()->json(['success' => false]);
        }
        else{
            $data = [
                'customer_id' => session()->get('cus_id'),
                'product_id' =>  $request->input('productid'),
                'message' =>  $request->input('content')
            ];
            if ($comment = $this->comment->create($data)){
                return response()->json(['success' => true]);
            }        
        }
    }
    public function delete($id)
    {
        $comment = $this->comment::find($id);
        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }
        $comment->delete();

        return response()->json(['success' => 'Comment deleted successfully']);
    }
    public function update(Request $request, $id)
    {
        $comment = $this->comment::find($id);
        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        $comment->message = $request->input('content');
        $comment->save();

        return response()->json(['success' => 'Comment updated successfully']);
    }
}
    