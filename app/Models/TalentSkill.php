<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentSkill extends Model
{
    use HasFactory;
    protected $table = 'talent_skills';

    public function talents(){
        $this->hasMany(Talent::class,'talent_id','id')->where('is_active',true);
    }
    public function scopeFilterSkills($query, $talent_ids)
    {
        return $query->whereIn('talent_id', $talent_ids)
                ->join('tbl_skills as skill', 'talent_skills.skill_id', 'skill.id')
                ->join('tbl_talents as talent','talent_skills.talent_id','talent.id')
                ->where('skill.is_active',true)
                ->select('skill.name as skill_name',
                        'skill.id as skill_id',
                        'skill.description as skill_description',
                        'talent.name as talent_name',
                        'talent.id as talent_id',
                        'talent.description as talent_description');
    }
}
