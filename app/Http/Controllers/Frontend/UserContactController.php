<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserContactController extends Controller
{
    public function submitstore(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $type = new Contacts();
        $type->name = @$request->name;
        $type->phone = @$request->phone;
        $type->email = @$request->email;
        $type->subject = @$request->subject;
        $type->message = @$request->message;
        $type->created_at = Carbon::now();
        $type->save();
        return redirect()->back()->with('success', 'បានផ្ងើរទៅដោយជោគជ័យ!'); 
    }




}
