<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];
    protected $table = "reservation";
    protected $dates = ['start', 'end'];
    public $timestamps = false;
    use HasFactory;


    protected static function boot()
    {
        parent::boot();
        static::retrieved(function ($model) {
            $model->start = $model->asDateTime($model->start);
            $model->end = $model->asDateTime($model->end);
        });
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
