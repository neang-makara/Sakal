<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Talent;
use App\Models\Contacts;
use App\Models\WebSkills;
use App\Models\HistoryUser;
use Illuminate\Http\Request;
use App\Models\WebStudentsSubmit;
use App\Models\WebDepartmentSkill;
use App\Http\Controllers\Controller;

class HistoryUserController extends Controller
{
    public function showForm(){
        $data['web_skills'] = WebSkills::where('status',1)->get()->sortBy('name')->sortBy('name');
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
            // 'created_by'     => auth()->user()->id,
        ];

        $subject = new HistoryUser($data);
       // $subject->save(); 
       $models = Skill::select('talents')->get();
       $collection = array_values($talentArray);

       $model_values = [];
        foreach($models as $model){
            $model_values = array_merge($model_values, $collection);
        }
        foreach($collection as $id){
            if(in_array($id, $model_values)){
                //returns true if the $idToCheck exist
                $arrayNewSearch = Skill::select('*')->WhereJsonContains('talents',$id)->limit(3)->get();
            }
            else{
                //returns false
            }
        }
        // dd($collection);
        $data['arrayNewSearch'] = @$arrayNewSearch;
        $data['collection'] = @$collection;
        $data['talents'] = Talent::where('status',1)->get()->sortBy('name')->sortBy('name');

        return view('frontend.request_skill',$data); 

        // return redirect()->route('talent.index')->with('success', 'Create success!'); 
    }
    
    public function studentSubmitSkill(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
        ]);

        $skillsArray = $request->input('skills');

        // Find ID department in web_department_skills
         $list_skill = DB::table('web_department_skills')
         ->join('web_skills', 'web_department_skills.skill_id', '=', 'web_skills.id')
         ->join('web_departments', 'web_department_skills.department_id', '=', 'web_departments.id')
         ->select('web_department_skills.*', 'web_skills.skill_name', 'web_departments.department_name')
         ->whereIn('web_department_skills.skill_id',@$skillsArray)
         ->get();
        $list_skills = $list_skill->groupBy('department_name')->map(function($values) {
             return $values->count();
        })->sort()->reverse();
        $collection = collect($list_skills);
 
        $chunks_array = $collection->chunk(3);
        //$newtest =  json_decode($chunks[0]);
        // if find no department
        @$chunks = @json_encode($chunks_array[0]);
        if(@$chunks == "null"){
            $chunks = "{}";
        }
        $newArray = WebSkills::select('skill_name')->whereIn('id', @$skillsArray)->pluck('skill_name')->toArray();;
        // $test =array_keys($list_skills);
        // dd($chunks[0]);json_decode
        // save data 
        $data = [
            'skill_text' => @json_encode($newArray),
            'result' => @$chunks,
            'data_obj->name' => @$request->name,
            'data_obj->gender' => @$request->gender,
            'data_obj->phone' => @$request->phone,
        ];
        $subject = new WebStudentsSubmit($data);
        $subject->save(); 

        $data['result'] = @$chunks;
        //dd($data);
        // view display
        $data['web_skills'] = WebSkills::where('status',1)->get()->sortBy('name')->sortBy('name');

        return view('frontend.request_skill', $data); 
    }
}