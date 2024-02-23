<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    private $reservationService;

    public function __construct()
    {
        $this->reservationService = new ReservationService();
    }

    public function index(){
        $reservations = $this->reservationService->getAll();
        return view("reservation.index", compact("reservations"));
    }

    public function dashboard(){
        return view("reservation.dashboard");
    }

    public function new(){
        $rooms = Room::get();
        $customers = Customer::get();
        return view("reservation.new", compact("rooms", "customers"));
    }

    public function edit(){
        return view("reservation.edit");
    }
}
