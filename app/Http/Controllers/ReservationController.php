<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view("reservation.index");
    }

    public function dashboard()
    {
        return view("reservation.dashboard");
    }

    public function new()
    {
        return view("reservation.new");
    }

    public function edit()
    {
        return view("reservation.edit");
    }
}
