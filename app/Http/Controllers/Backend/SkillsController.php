<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Talent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillsController extends Controller
{
    public function index(){
        // $data['skills'] = Skill::get()->sortBy('name')->sortBy('name');
       $skills = Skill::with('talent')->get()->sortBy('name');
        // foreach($skills->talents as $item){
            dd($skills);
        // }
//         foreach($skills->talents as $items){
// dd($items);
//         }

$skills = collect($skills['talents'])->map(function ($voucher) {
    return (object) $voucher;
});
dd($skills);
        $data['skills'] = $skills;
        return view('backend.skill.index', $data);
    }

    public function create(){
        $data['test'] = "";
        return view('backend.skill.create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
        ]);

        $subject = new Skill();
        $subject->name = @$request->name;
        $subject->talent_id = "[]";
        $subject->created_by = auth()->id();
        $subject->save();

        return redirect()->route('skill.index')->with('success', 'Create success!'); 
    }

    public function edit($id){
        $skill = Skill::findOrFail($id);       
        // Get related convert to array
        $relative_id         = json_decode($skill->talent_id);
        // Get Value
        $data['relative_talents'] = @Talent::whereIn("id", @$relative_id)->get();
        $data['skill'] = $skill;
// dd($data);
        $data['talents'] = @Talent::where('status',1)->get();

        return view('backend.skill.edit', $data);
    }

    public function update(Request $request){
        $skill_id = $request->id;
        Skill::findOrFail($skill_id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
            'updated_by' => auth()->id()
        ]);
        return redirect()->route('skill.index')->with('info', 'Update success!'); 
    }

    public function inactive($id){
        Skill::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        Skill::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('info', 'Active success!'); 
    }

    public function assign(Request $request){
        $skill_id = $request->skill_assign_id;
        $saveAssign = Skill::find($skill_id);
        //read the checkbox input from the form.
        $talentArray = $request->input('talents');

        //while saving 
        $saveAssign->talents = json_encode($talentArray);

        $saveAssign->updated_by = auth()->id();
        $saveAssign->updated_at = Carbon::now();
        $saveAssign->save();
        return redirect()->back()->with('success', 'Assign success!'); 
        
    }


}
