<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationService
{
    public function getAll()
    {
        return Reservation::where('active', 1)->with('room', 'customer')->get();
    }

    public function getAlmostExpired()
    {
        $oneWeekFromNow = Carbon::today()->addWeek();

        return Reservation::where('active', 1)
            ->whereDate('end', '<=', $oneWeekFromNow)
            ->whereHas('room.type', function ($query) {
                $query->where('name', 'Kantoor');
            })
            ->with('room.type', 'customer')
            ->get();
    }

    public function getToday()
    {
        $currentDate = Carbon::today();
        return Reservation::where('active', 1)
            ->whereDate('start', '<=', $currentDate)
            ->whereDate('end', '>=', $currentDate)
            ->with('room', 'customer')
            ->get();
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
