<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Property;

class Locality extends Model
{
    use HasFactory, SoftDeletes;

    // Table Name
    protected $table = "localities";

    // Mass assignable fields
    protected $fillable = [
        'locality_name',
        'latitude',
        'longitude',
    ];

    // Date attributes
    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function properties(){
        return $this->belongsToMany(Property::class, 'locality_id');
    }
}
