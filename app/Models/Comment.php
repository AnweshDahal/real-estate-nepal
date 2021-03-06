<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    // Table Name
    protected $table = 'comments';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'property_id',
        'comment_text',
    ];

    // Date Attributes
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
