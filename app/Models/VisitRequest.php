<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitRequest extends Model
{
    use HasFactory, SoftDeletes;

    // Table name
    protected $table = 'visit_requests';

    // Attributes that are mass assignable
    protected $fillable = [
        'visit_date',
        'requestor',
        'property_id',
    ];

    // Date attributes
    protected $date = [
        'visit_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Attributes that should be cast
    protected $cast = [
        "visit_date" => "datetime",
    ];
}
