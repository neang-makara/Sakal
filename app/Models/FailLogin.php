<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailLogin extends Model
{
    use HasFactory;
    protected $table = 'fail_logins';
    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'fail_time',
        'message',
        'created_at',
        'updated_at'
    ];
}
