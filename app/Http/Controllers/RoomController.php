<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct()
    {
        $this->roomService = new RoomService();
    }

    public function index()
    {
        $rooms = $this->roomService->getAllRooms();
        return (view('rooms.index', compact('rooms')));
    }

    public function new()
    {
        $rooms = $this->roomService->getAllTypes();
        return (view('rooms.new', compact('rooms')));
    }

    public function store(Request $request){

    }
}
