<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Talent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\TalentSkill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SkillsController extends Controller
{
    public function index(){
        // $data['skills'] = Skill::get()->sortBy('name')->sortBy('name');
        $param = [
            'skills' => Skill::all(),
        ];
    
        return view('backend.skill.index', $param);
    }

    public function create(){
        $talent_skills = collect([]);
        $param = [
            'skill' => new Skill,
            'talents' => Talent::all(),
            'talent_skills' => $talent_skills,
        ];
        return view('backend.skill.create', $param);
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
        ]);
        try{
            DB::beginTransaction();
            $message  = 'Update';
            $skill = Skill::find($request->id);
            if(is_null($skill)){
                $message = 'Create';
                $skill = new Skill;
            }
            $skill->is_active = !is_null($request->is_active) ? TRUE : FALSE;
            $skill->name = $request->name;
            $skill->description = $request->description ?? 'N/A';
            $skill->created_by = Auth::user()->id;
            $skill->save();
            forEach($request->talent_ids as $id){
                $talent_skill = TalentSkill::find($id);
                if(is_null($talent_skill)){
                    $talent_skill = new TalentSkill;
                }
                $talent_skill->skill_id = $skill->id;
                $talent_skill->talent_id = $id;
                $talent_skill->is_active = true;
                $talent_skill->save();
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('skill.index')->with('success', ''.$message.' success!'); 
    }

    public function edit($id){
        $talent_skills = TalentSkill::where('is_active',true)->where('skill_id',$id)->get();
        $param = [
            'talents' => Talent::where('is_active',true)->get(),
            'talent_skills' => $talent_skills->pluck('talent_id'),
            'skill' => Skill::find($id),
        ];
        return view('backend.skill.create', $param);
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
        Skill::findOrFail($id)->update(['is_active' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        Skill::findOrFail($id)->update(['is_active' => 1]);
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
