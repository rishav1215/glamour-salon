<?php

namespace App\Policies;

use App\Models\Appointments;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AppointmentPolicy
{
    public function view(User $user, Appointments $appointment)
    {
        return $user->id == $appointment->customer_id || $user->id == $appointment->salon_owner_id;
    }

    public function update(User $user, Appointments $appointment)
    {
        return $user->id == $appointment->salon_owner_id;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
  

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
  

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Appointments $appointments): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Appointments $appointments): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Appointments $appointments): bool
    {
        return false;
    }
    
    
}
