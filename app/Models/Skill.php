<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    protected $table = 'tbl_skills';

    public function createdBy(){
        return $this->belongsTo(User::class, "created_by", "id");
    } 
    public function talent()
    {
        return $this->belongsTo(Talent::class, "talent_id", "id");
    } 
}
