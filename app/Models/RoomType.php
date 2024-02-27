<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $guarded = [];
    protected $table = "room_type";
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
