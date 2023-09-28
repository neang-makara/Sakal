<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsYouth extends Model
{
    protected $table = 'newsyouth';

    protected $fillable = [
        'newsyouth_id',
        'title',
        'description',
        'image',
        'link',
    ];



}
