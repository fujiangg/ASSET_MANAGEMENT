<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $post = Message::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboards.Message.datamessage',compact('post'));

        
    }
    public function store(Request $request)
    {
        $post = new Message;
        $post->fullname = $request->fullname;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->subject = $request->subject;
        $post->message = $request->message;
        $post->save();
        return redirect('landingpage')->with('status', 'Blog Post Form Data Has Been inserted');
        
    }
    // change status 
     public function changeStatus($id){
        $getStatus = Message::select('status')->where('id',$id)->first();
        if($getStatus->status==0){
            $status = 1;
        }else{
            $status = 0;
        }
        Message::where('id',$id)->update(['status'=>$status]);
        // Toastr::success('Status Succesfully Changed', 'Success', ["positionClass" => "toast-top","closeButton"]);
        return redirect()->back();
    }
    public function multiDelete(Request $request) 
{
    Message::whereIn('id', $request->get('selected'))->delete();

    return response("Selected post(s) deleted successfully.", 200);
}
 /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Message::findorfail($id);

        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');

    }

}


    

    

    
    
    



