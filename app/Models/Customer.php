<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($data)
 */
class Customer extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "customer";


    public function reservations()
    {
        return $this->hasMany(Reservation::class, "customer_id", "id");
    }
}
