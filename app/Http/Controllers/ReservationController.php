<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use App\Services\ReservationService;
use Illuminate\Http\Request;

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

    public function store(Request $request){
        dd($request);
//        $data = $request->validate(['room' => '', 'customer' => 'required|email', 'phone' => 'required|numeric']);
//        $this->customerService->createCustomer($data);
//        return redirect()->route('customer');
    }
}
