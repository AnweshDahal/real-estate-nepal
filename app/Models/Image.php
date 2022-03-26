<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    // Table Name
    protected $table = 'images';


    // Mass assignable attributes
    protected $fillable = [
        'property_id',
        'file_name',
        'is_thumbnail',
    ];

    // Date attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
}
