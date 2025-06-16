<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
      use HasFactory;

    protected $fillable = [
        'user_id',     // <-- add this line
        'name',
        'location',
        'description',
        'image',
        'services',
        'is_approved',
    ];

    // Relationships, e.g. salon belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
