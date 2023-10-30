<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index(){
        $messages = Contacts::orderBy('id','desc')->get();
        return view('backend.web.contact.allmessage',compact('messages'));
    }
    public function view($id){
        $message = Contacts::where('id',$id)->first();
        return view('backend.contact.view',compact('message'));
    }
     public function read($id){

        Contacts::findOrFail($id)->update(['status' => 0]);

        $message = Contacts::where('id',$id)->first();

        return view('backend.web.contact.view',compact('message'));
    }

    public function deleted($id){
        Contact::findOrFail($id)->update([
            'deleted_at' => Carbon::now(),
            'deleted_by'=>auth()->id()
        ]); 
        
        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  
    }
}
