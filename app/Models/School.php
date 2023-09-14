<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'name',
        'type_id',
        'logo',
        'note',
        'latitude',
        'longitude'
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function departments() {
        return $this->hasMany(Department::class, 'school_id', 'id');
    }
}
