<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index() {
        return view('frontend.about');
    }
    public function submitstore(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        dd($request->all());
        $type = new Contacts();
        $type->name = $request->name;
        $type->phone = $request->phone;
        $type->email = $request->email;
        $type->subject = $request->subject;
        $type->message = $request->message;
        $type->created_at = Carbon::now();
        $type->save();

        return view('frontend.request_skill'); 

    }
}
