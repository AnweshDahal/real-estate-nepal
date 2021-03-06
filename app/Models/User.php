<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Related Models
use App\Models\UserStatus;
use App\Models\Property;
use App\Models\Like;
use App\Models\VisitRequest;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // Table Name
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'email',
        'password',
    ];

    /**
     * The date attributes
     * 
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Function to get the user's status, i.e. Role
     * 
     * @return UserStatus
     */
    public function status()
    {
        return $this->hasOne(UserStatus::class);
    }

    public function fullName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'user_id');
    }

    public function hasLiked(Property $property)
    {
        return Like::where('property_id', '=', $property->id)->where('user_id', '=', auth()->user()->id)->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function sentVisitRequest()
    {
        return $this->hasMany(VisitRequest::class, 'requestor');
    }

    public function recievedVisitRequest()
    {
        return $this->hasMany(VisitRequest::class, 'requestee');
    }
}
