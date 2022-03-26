<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Image;
use App\Models\Locality;
use App\Models\User;

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
        'listing_type',
        'property_category',
        'price',
        'property_size',
    ];

    // Date Attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Listing Types
    const LISTING_TYPES = [
        'SALE' => 'SALE',
        'RENT' => 'RENT',
    ];

    // Property Categories
    const PROPERTY_CATEGORY = [
        'LAND' => 'LAND',
        'HOUSE' => 'HOUSE',
        'APARTMENT' => 'APARTMENT',
        'ROOM' => 'ROOM',
    ];

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
