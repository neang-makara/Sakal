<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Models\Skill;
use App\Models\Talent;
use App\Models\HistoryUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryUserController extends Controller
{
    public function showForm(){
        $data['talents'] = Talent::where('status',1)->get()->sortBy('name')->sortBy('name');
        // dd($data);
        return view('frontend.request_skill',$data);
    }

    public function userSubmitTalent(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
        ]);

        $talentArray = $request->input('talents');

        $data = [
            'data_obj->talent' => @$talentArray,
            'data_obj->name' => @$request->name,
            'data_obj->gender' => @$request->gender,
            'data_obj->phone' => @$request->phone,
            'created_by'     => auth()->user()->id,
        ];

        $subject = new HistoryUser($data);
        $subject->save(); 
        return redirect()->back()->with('success', 'Success: Your skill be'.$request->name); 

        // return redirect()->route('talent.index')->with('success', 'Create success!'); 
    }
}
