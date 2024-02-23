<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    public function getAllRooms()
    {
        // Retrieve all rooms from the database
        return Room::all();
    }

    public function getAllTypes(){
        return Room::where('active', 1)->get();
    }

    public function createRoom($data)
    {
        return Room::insert($data);
    }
}
