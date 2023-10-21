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
}
