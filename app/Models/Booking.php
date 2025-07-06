<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $fillable = [
    'salon_id',
    'user_id',
    'name',
    'contact',
    'email',
    'appointment_date', 
    'appointment_time',
    'status',
    'notes',
];

public function salon() {
    return $this->belongsTo(Salon::class);  
}
}
