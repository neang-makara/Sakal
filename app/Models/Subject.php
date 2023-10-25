<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    protected $table = 'tbl_subjects';

    protected $fillable = [
        'name',
        'description',
        'department_id'
    ];

    public function department() {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
