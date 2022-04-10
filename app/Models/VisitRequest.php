<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class VisitRequest extends Model
{
    use HasFactory, SoftDeletes;

    // Table name
    protected $table = 'visit_requests';

    // Attributes that are mass assignable
    protected $fillable = [
        'visit_date',
        'requestor',
        'requestee',
        'property_id',
        'status',
    ];

    // Date attributes
    protected $date = [
        'visit_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS = [
        'PENDING' => 'PENDING',
        'ACCEPTED' => 'ACCEPTED',
        'REJECTED' => 'REJECTED',
    ];

    // Attributes that should be cast
    protected $cast = [
        "visit_date" => "datetime",
    ];

    // Getting the property for which teh visit request has been made
    public function property()
    {
        return $this->hasOne(Property::class);
    }

    public function requestorInfo()
    {
        return $this->belongsTo(User::class, 'requestor');
    }

    public function requesteeInfo()
    {
        return $this->belongsTo(User::class, 'requestee');
    }
}
