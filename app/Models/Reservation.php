<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];
    protected $table = "reservation";
    use HasFactory;

    public function room(){
        return $this->hasOne(Room::class, "room_id", "id");
    }

    public function customer(){
        return $this->hasOne(Customer::class, "customer_id", "id");
    }
}
