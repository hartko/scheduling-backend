<?php
namespace App\Http\Services;

use App\Http\Requests\CreateRoomRequest;
use App\Models\Room;

use Illuminate\Support\Facades\Hash;

class RoomService
{
    /**
     * Get list of rooms.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($search)
    {
        // Retrieve and return all rooms
        return Room::where('roomId', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('building', 'like', '%' . $search . '%')
            ->orWhere('floor', 'like', '%' . $search . '%')
            ->orWhere('building', 'like', '%' . $search . '%')->get()->makeHidden(['id', 'created_at', 'updated_at']);
        ;
    }
    /**
     * Attempt to create room.
     *
     * @param  CreateRoomRequest  $request
     * @return bool
     */
    public function store(CreateRoomRequest $request)
    {
        $room = Room::create([
            'roomId' => $request->roomId,
            'name' => $request->name,
            'capacity' => $request->capacity,
            'floor' => $request->floor,
            'building' => $request->building
        ]);
        return $room;
    }

    /**
     * Mass create rooms.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function massCreate($request)
    {
        // Parse the input JSON string into an array of room objects
        $rooms = json_decode($request->input('rooms'));
        // Iterate over each room object and create a new room record
        foreach ($rooms as $room) {
            Room::create((array) $room);
        }
        return true;
    }

    public function update(CreateRoomRequest $request)
    {
        $updateRoom = Room::where('roomId', $request->roomId)->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'floor' => $request->floor,
            'building' => $request->building,
        ]);

        return $updateRoom;
    }
}