<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Talent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class TalentsController extends Controller
{
    public function index(){
        $param = [
            'users' => User::all(),
            'talents' => Talent::all(),
        ];
        return view('backend.talent.index', $param);
    }

    public function create(){
        $param = [
            'talent' => new Talent,
        ];
        return view('backend.talent.create',$param);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
        ]);
        $message  = 'Update';
        $talent = Talent::find($request->id);
        if(is_null($talent)){
            $message = 'Create';
            $talent = new Talent;
        }
        $talent->is_active = !is_null($request->is_active) ? TRUE : FALSE;
        $talent->name = $request->name;
        $talent->description = $request->description;
        $talent->created_by = auth()->id();
        $talent->save();

        return redirect()->route('talent.index')->with('success', ''.$message. 'success!'); 
    }

    public function edit($id){
        $param = [
            'talent' => Talent::find($id),
        ];
        return view('backend.talent.create', $param);
    }

    public function update(Request $request){
        $talent_id = $request->id;
        talent::findOrFail($talent_id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
            'updated_by' => auth()->id()
        ]);
        return redirect()->route('talent.index')->with('info', 'Update success!'); 
    }

    public function inactive($id){
        talent::findOrFail($id)->update(['is_active' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        talent::findOrFail($id)->update(['is_active' => 1]);
        return redirect()->back()->with('info', 'Active success!'); 
    }

}
