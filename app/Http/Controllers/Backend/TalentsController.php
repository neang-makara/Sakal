<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Skill;
use App\Models\Talent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TalentsController extends Controller
{
    public function index(){
        $data['talents'] = Talent::get()->sortBy('name')->sortBy('name');
        // dd($data);
        return view('backend.talent.index', $data);
    }

    public function create(){
        return view('backend.talent.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:talent|max:255',
        ]);

        $subject = new talent();
        $subject->name = @$request->name;
        // $subject->skill_id = @$request->skill_id;
        $subject->created_by = auth()->id();
        $subject->save();

        return redirect()->route('talent.index')->with('success', 'Create success!'); 
    }

    public function edit($id){
        $data['talent'] = talent::findOrFail($id);
        return view('backend.Talent.edit', $data);
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
        talent::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        talent::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('info', 'Active success!'); 
    }

}
