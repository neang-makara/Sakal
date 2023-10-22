<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebSkills extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function createdBy(){
        return $this->belongsTo(User::class, "created_by", "id");
    }
}
