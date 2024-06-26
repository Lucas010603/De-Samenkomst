<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    public function getAllTypes()
    {
        return Room::where('active', 1)->get();
    }

    public function createRoom($data)
    {
        return Room::insert($data);
    }

    public function update($id, $data)
    {
        $room = Room::find($id);
        return $room->update($data);
    }

    public function delete($id)
    {
        $room = Room::find($id);
        return $room->update(["active" => 0]);
    }
}
