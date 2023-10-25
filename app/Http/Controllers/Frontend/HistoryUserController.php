<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Models\Skill;
use App\Models\Talent;
use App\Models\HistoryUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TalentSkill;

class HistoryUserController extends Controller
{
    public function showForm(){
        $data['talents'] = Talent::where('is_active',1)->get()->sortBy('name')->sortBy('name');
        // dd($data);
        return view('frontend.request_skill',$data);
    }

    public function userSubmitTalent(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
        ]);
        $talentArray = $request->input('talents');
        $user_skills = TalentSkill::filterSkills($talentArray)->get();
        $data = [
            'data_obj->talent' => @$talentArray,
            'data_obj->name' => $request->name,
            'data_obj->gender' => @$request->gender,
            'data_obj->phone' => @$request->phone,
            'data_obj->skill' => @$user_skills->pluck('skill_id')->toArray(),
            'created_by'     => 1,
        ];

        $subject = new HistoryUser($data);
        $subject->save(); 
        $param = [
            'user_skills' => $user_skills,
            'user_history' => $subject,
            'skills' => Skill::all(),
            'talents' => Talent::all()

        ];
        return view('frontend.match_skill',$param);

        // return redirect()->route('talent.index')->with('success', 'Create success!'); 
    }
}
