<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    protected $table = "room";
    use HasFactory;

    public function reservations()
    {
        return $this->hasMany(Reservation::class, "room_id", "id");
    }

    public function type(){
        return $this->hasOne(RoomType::class, "id", "type_id");
    }
}
