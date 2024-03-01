<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private ReservationService $reservationService;

    public function __construct()
    {
        $this->reservationService = new ReservationService();
    }

    public function index()
    {
        $reservations = $this->reservationService->getAll();
        return view("reservation.index", compact("reservations"));
    }

    public function dashboard()
    {
        $reservations = $this->reservationService->getToday();
        $almostExpired = $this->reservationService->getAlmostExpired();
        return view("reservation.dashboard", compact('reservations', 'almostExpired'));
    }

    public function new()
    {
        $rooms = Room::where('active', 1)->get();
        $customers = Customer::where('active', 1)->orderBy('company')->get();
        return view("reservation.new", compact("rooms", "customers"));
    }

    public function edit($id)
    {
        $rooms = Room::where('active', 1)->get();
        $customers = Customer::where('active', 1)->orderBy('company')->get();
        $reservation = Reservation::where(['active' => 1, 'id' => $id])->with('customer', 'room')->first();
        return view("reservation.edit", compact('reservation', 'rooms', 'customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'customer_id' => 'required',
                'room_id' => 'required',
                'start' => 'required|date',
            ]
        );

        $this->reservationService->store($data);
        return redirect()->route('reservation');
    }

    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'customer_id' => 'required',
                'room_id' => 'required',
            ]
        );
        $this->reservationService->update($id, $data);
        return redirect()->route('reservation');
    }

    public function delete($id)
    {
        return response()->json($this->reservationService->delete($id));
    }

    public function extend($id)
    {
        return $this->reservationService->extend($id);
    }
}
