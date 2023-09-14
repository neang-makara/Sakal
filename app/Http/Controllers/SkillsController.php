<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skills;

class SkillsController extends Controller
{
    public function insertSkill(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hobby' => 'required'

        ]);


        $skill = new skills;
        $skill->skills_name = $request->name;
        $skill->skills_subject = json_encode($request->hobby);
        $skill->save();
        return redirect()->back();

        //dd($request->all());
    }


    public function showData()
    {
        $showSkill = skills::all();
        return view('frontend.show', compact('showSkill'));
    }


}
