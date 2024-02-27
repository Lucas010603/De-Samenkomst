<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
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
        $rooms = $this->roomService->getAllTypes();
        return (view('rooms.index', compact('rooms')));
    }

    public function new()
    {
        $rooms = $this->roomService->getAllTypes();
        $roomTypes = RoomType::where('active', 1)->get();
        return (view('rooms.new', compact('rooms', 'roomTypes')));
    }

    public function edit($id)
    {
        $rooms = Room::where(['active' => 1, 'id' => $id])->first();
        $roomTypes = RoomType::where('active', 1)->get();
        return view("Rooms.edit", compact('rooms', 'roomTypes'));
    }

    public function store(Request $request){
        $data = $request->validate(
            [
                'number' => 'required|numeric',
                'name' => 'required',
                'max_capacity' => 'required',
                'type_id' => 'required',
                'table_configuration' => 'required',
                'monitor' => 'required'
            ]
        );
        $this->roomService->createRoom($data);
        return redirect()->route('room');
    }

    public function update($id, Request $request)
    {
        $data = $request->validate(
            [
                'number' => 'required|numeric',
                'name' => 'required',
                'max_capacity' => 'required',
                'type_id' => 'required',
                'table_configuration' => 'required',
                'monitor' => 'required'
            ]
        );
        $this->roomService->update($id, $data);
        return redirect()->route('room');
    }

    public function delete($id)
    {
        return response()->json($this->roomService->delete($id));
    }
}
