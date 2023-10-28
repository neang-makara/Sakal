<?php

namespace App\Http\Controllers;

use App\Models\HistoryUser;
use App\Models\Skill;
use App\Models\Talent;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index(){
        $data = HistoryUser::all();
        return view('backend.report.index',compact('data'));
    }
    public function inactive($id){
        HistoryUser::findOrFail($id)->update(['is_active' => 0]);
        return redirect()->back()->with('info', 'Disabled success!');   
    }

    public function active($id){
        HistoryUser::findOrFail($id)->update(['is_active' => 1]);
        return redirect()->back()->with('info', 'Active success!'); 
    }
    public function download($id = null){
        
        if(!is_null($id)){
            $user_data = HistoryUser::where('id',$id)->get();
            $data = [
                'user_data' => $user_data,
                'skills' => Skill::where('is_active',true)->get(),
                'talents' => Talent::where('is_active',true)->get(),
            ];
        }else{
            $data = [
                'user_data' => HistoryUser::where('is_active',true)->get(),
                'skills' => Skill::where('is_active',true)->get(),
                'talents' => Talent::where('is_active',true)->get(),
            ];
        }
        $pdf = PDF::loadView('backend.report.report',compact('data'));
        return $pdf->stream();
    }

}
