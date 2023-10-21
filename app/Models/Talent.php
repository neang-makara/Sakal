<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Talent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    // public function skill() {
    //     return $this->belongsTo(Skill::class, 'skill_id', 'id');
    // }

    public function createdBy(){
        return $this->belongsTo(User::class, "created_by", "id");
    }
    
   public function skill() {
    return $this->belongsTo(Skill::class,'talent_id', 'id');
}
}

