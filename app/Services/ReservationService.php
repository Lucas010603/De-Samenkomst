<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\Room;
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
            ->where('is_contract', 1)
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
        $room = Room::where('id', $data['room_id'])->with('type')->first();
        $rent_duration = $room->type->standard_rent_duration;
        $needsContract = $room->type->needs_contract;

        return Reservation::insert([
            'customer_id' => $data["customer_id"],
            'room_id' => $data["room_id"],
            'start' => $data["start"],
            'end' => Carbon::parse($data["start"])->addDays($rent_duration)->format('Y-m-d\TH:i'),
            'is_contract' => $needsContract,
        ]);
    }

    public function update($id, $data)
    {
        $reservation = Reservation::find($id);

        return $reservation->update([
            'customer_id' => $data["customer_id"],
            'room_id' => $data["room_id"],
        ]);
    }

    public function delete($id)
    {
        $reservation = Reservation::find($id);
        return $reservation->update(["active" => 0]);
    }

    public function extend($id){
        $reservation = Reservation::find($id);
        $rent_duration = $reservation->room->type->standard_rent_duration;
        $new_end_date = $reservation->end->addDays($rent_duration)->format('Y-m-d\TH:i');
        return $reservation->update([
            'end' => $new_end_date,
        ]);
    }
}
