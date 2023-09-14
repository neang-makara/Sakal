<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'school_id'
    ];

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function subjects() {
        return $this->hasMany(Subject::class, 'department_id', 'id');
    }
}
