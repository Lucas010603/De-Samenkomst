<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function getAll()
    {
        return Reservation::get();
    }

    public function getToday()
    {
    }
}
