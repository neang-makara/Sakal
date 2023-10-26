<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebDepartmentSkill extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $guarded =[];
    
    public function createdBy(){
        return $this->belongsTo(User::class, "created_by", "id");
    }

    // public function skill(){
    //     // return $this->hasMany(WebSkills::class,'skill_id','id');
    //     return $this->belongsTo(WebSkills::class, "skill_id", "id");
    // }

    // public function department(){
    //     return $this->belongsTo(WebDepartments::class, "department_id", "id");
    // }
    public function skill()
{
    return $this->belongsTo(\App\WebSkills::class, 'skill_id');
}
public function department()
{
    return $this->belongsTo(\App\WebDepartments::class, 'department_id');
}
}

