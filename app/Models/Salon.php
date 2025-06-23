<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
      use HasFactory;

   protected $fillable = [
    'user_id', 'name', 'contact_number', 'description', 'location', 'image', 'gallery',
    'owner_name', 'owner_email', 'owner_image', 'owner_bio',
    'address', 'city', 'state', 'postal_code', 'country',
    'services', 'specializations',
    'opening_hours', 'years_in_business', 'number_of_stylists', 'accepts_credit_cards',
    'is_approved', 'payment_id', 'approved_at', 'order_id',
];

protected $casts = [
    'is_approved' => 'boolean',
    'approved_at' => 'datetime',
];

    // Relationships, e.g. salon belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bookings() {
    return $this->hasMany(Booking::class);
}


}
