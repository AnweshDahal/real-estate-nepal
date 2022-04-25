<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Image;
use App\Models\Locality;
use App\Models\User;
use App\Models\Comment;
use App\Models\VisitRequest;

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
        'unit',
    ];

    // Date Attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Listing Types
    const LISTING_TYPES = [
        'SALE' => 'Sale',
        'RENT' => 'Rent',
    ];

    // Property Categories
    const PROPERTY_CATEGORY = [
        'LAND' => 'Land',
        'HOUSE' => 'House',
        'APARTMENT' => 'Apartment',
        'ROOM' => 'Room',
    ];

    // Property Units
    const UNITS = [
        'BIGHA-KATHA-DHUR' => 'Bigha-Katha-Dhur',
        'ROPANI-ANA-PAISA' => 'Ropani-Ana-Paisa',
        'SQFT' => 'Sq. Ft.',
        'SQMTR' => 'Sq. Meter',
    ];

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function thumbnail()
    {
        return Image::where('property_id', '=', $this->id)->where('is_thumbnail', '=', 1)->get();
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function visitRequest()
    {
        return $this->hasMany(VisitRequest::class);
    }

    public function priceForHumans(){
        $price = $this->price;

        if($price>1000000000000) return round(($price/1000000000000),1).' tn';
        else if($price>1000000000) return round(($price/1000000000),1).' bn';
        else if($price>1000000) return round(($price/1000000),1).' m';
        else if($price>1000) return round(($price/1000),1).' k';
    }
}
