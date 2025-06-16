<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    
      protected $fillable = ['customer_id', 'salon_owner_id', 'appointment_time', 'status'];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function salonOwner()
    {
        return $this->belongsTo(User::class, 'salon_owner_id');
    }
}
