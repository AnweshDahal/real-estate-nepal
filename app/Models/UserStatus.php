<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatus extends Model
{
    use HasFactory, SoftDeletes;

    // Table Name
    protected $table = 'user_statuses';

    // Attributes that are mass assignable
    protected $filllable = [
        'user_id',
        'role'
    ];

    // Date attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Values that could be used for role
    public const ROLES = [
        'admin' => 'admin',
        'user' => 'user'
    ];
}
