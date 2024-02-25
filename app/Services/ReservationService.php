<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function getAll()
    {
        return Reservation::where('active', 1)->with('room', 'customer')->get();
    }

    public function getToday()
    {
    }

    public function store($data)
    {
        return Reservation::insert($data);
    }

    public function update($id, $data)
    {
        $reservation = Reservation::find($id);
        return $reservation->update($data);
    }

    public function delete($id)
    {
        $reservation = Reservation::find($id);
        return $reservation->update(["active" => 0]);
    }
}
