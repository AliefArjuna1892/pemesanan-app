<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::paginate(10);

        return view('admin.room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('admin.room_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type' => 'required',
        ]);

        RoomType::create($request->all());

        return redirect()->route('admin.room_types.index')->with('success', 'Room type created successfully.');
    }

    public function edit(RoomType $roomType)
    {
        return view('admin.room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'room_type' => 'required',
        ]);

        $roomType->update($request->all());

        return redirect()->route('admin.room_types.index')->with('success', 'Room type updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return redirect()->route('admin.room_types.index')->with('success', 'Room type deleted successfully.');
    }
}
