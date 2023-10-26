<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\WebSkills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebSkillController extends Controller
{
    public function index(){
        $data['skills'] = WebSkills::orderBy('id', 'DESC')->get();
        // dd($data);
        return view('backend.web.skill.index', $data);
    }

    public function create(){
        return view('backend.web.skill.create');
    }

    public function store(Request $request){
        $request->validate([
            'skill_name' => ['required'],
        ]);

        $subject = new WebSkills();
        $subject->skill_name = @$request->skill_name;
        $subject->created_by = auth()->id();
        $subject->save();

        return redirect()->route('web_skill.index')->with('success', 'Create success!'); 
    }

    public function edit($id){
        $data['skill'] = WebSkills::findOrFail($id);
        return view('backend.web.skill.edit', $data);
    }

    public function update(Request $request){
        $skill_id = $request->id;
        WebSkills::findOrFail($skill_id)->update([
            'skill_name' => $request->skill_name,
            'updated_at' => Carbon::now(),
            'updated_by' => auth()->id()
        ]);
        return redirect()->route('web_skill.index')->with('info', 'Update success!'); 
    }

    public function inactive($id){
        WebSkills::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        WebSkills::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('info', 'Active success!'); 
    }

}
