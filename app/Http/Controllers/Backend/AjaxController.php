<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TalentSkill;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function unSelectTalent(Request $request,$id){
        $status = 0;
        if(!is_null($request->skill_id)){
            $talent_skill = TalentSkill::where('skill_id',$request->skill_id)
                                ->where('talent_id',$id)
                                ->where('is_active',true)
                                ->first();
            $status = 1;
            if(!is_null($talent_skill)){
                $status = 2;
                $talent_skill->is_active = false;
                $talent_skill->save();
            }
        }
        return response()->json($status);
        
    }
}
