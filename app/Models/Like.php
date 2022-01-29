<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory, SoftDeletes;

    // Table Name
    protected $table = 'likes';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'property_id',
    ];

    // Date Attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
