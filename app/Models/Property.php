<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    // Table name
    protected $table = "properties";

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'locality_id',
        'property_name',
        'address',
        'latitude',
        'longitude',
        'description',
    ];

    // Date Attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
