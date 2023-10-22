<?php

namespace App\Http\Controllers\Backend;

use DB;
use Carbon\Carbon;
use App\Models\WebSkills;
use Illuminate\Http\Request;
use App\Models\WebDepartments;
use App\Models\WebDepartmentSkill;
use App\Http\Controllers\Controller;

class WebDepartmentController extends Controller
{
    public function index(){
        $data['departments'] = WebDepartments::orderBy('id', 'DESC')->get();
//        $data['departments'] = WebDepartmentSkill::with('skill')->groupBy('skill_id')->get();

        // $test = WebDepartmentSkill::select("*")
        // ->where(1,1)
        // ->orderBy('skill_id', 'desc')
        // ->groupBy('skill_id');
        // $data['users'] = WebDepartmentSkill::join('web_department','web_department_skills.department_id','web_department.id')
        //                     ->select('web_department_skills.*')
        //                     ->get();

                            // $data['users'] = User::orderBy('users.id','desc')
                            // ->join('roles','users.role_id','roles.id')
                            // ->select('users.*','roles.name as rname')
                            // ->paginate(config('app.row'));
// dd($test);
        return view('backend.web.department.index', $data);
    }

    public function create(){
        return view('backend.web.department.create');
    }

    public function store(Request $request){
        $request->validate([
            'department_name' => ['required'],
        ]);

        $subject = new WebDepartments();
        $subject->department_name = @$request->department_name;
        $subject->skill_text = "[]";
        $subject->created_by = auth()->id();
        $subject->save();
        return redirect()->route('web_department.index')->with('success', 'Create success!'); 
    }

    public function edit($id){
        $data['department'] = WebDepartments::findOrFail($id);
        
        // list view assign skill
        $data['skills'] = @WebSkills::orderBy('id','desc')->where('status',1)->get();
        // list Department from table web_department_skill
        $data['relative_departments'] = @WebDepartmentSkill::where("department_id", @$id)->get();
        return view('backend.web.department.edit', $data);
    }

    public function inactive($id){
        WebDepartments::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        WebDepartments::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('info', 'Active success!'); 
    }

    public function update(Request $request){
        $department_id = $request->id;
        WebDepartments::findOrFail($department_id)->update([
            'department_name' => $request->department_name,
            'updated_at' => Carbon::now(),
            'updated_by' => auth()->id()
        ]);
        return redirect()->route('web_department.index')->with('info', 'Update success!'); 
    }

    public function assign(Request $request){
        $skill_array = $request->input('skill_id');
        $department_id = $request->department_assign_id;

        // ID skill for update
        $updateDepartment = WebDepartments::find($department_id);
        //while saving 
        $updateDepartment->skill_text = json_encode($skill_array);
        $updateDepartment->save();

        $saveAssign = WebDepartmentSkill::where('department_id',$department_id);
        $saveAssign->delete();

        //create loop
        if(@$skill_array){
            foreach($skill_array as $itemString){
                // remove string only first
                $text_skill=explode("_",$itemString);
                $skill_id= $text_skill[0];
// dd($skill_id);
                $save = new WebDepartmentSkill();
                
                $save->department_id = $department_id;
                $save->skill_id = $skill_id;
                $save->save();

            }
        }
        return redirect()->route('web_department.index')->with('info', 'Assign success!'); 

    }


}
