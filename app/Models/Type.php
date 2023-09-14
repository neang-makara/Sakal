<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = [
        'name'
    ];

    public function schools() {
        return $this->hasMany(School::class, 'type_id', 'id');
    }
}
