<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('salon.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
