<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRoomRequest;

use App\Http\Services\RoomService;

class RoomController extends Controller
{

    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    /**
     * Endpoint to fetch a list of rooms.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {

            $rooms = $this->roomService->list($request->input('search'));

            return response()->json([
                'result' => 'success',
                'data' => $rooms
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
    /**
     * Endpoint to store a single room.
     * 
     * @param  \App\Http\Requests\CreateRoomRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRoomRequest $request)
    {
        try {
            $saveRoom = $this->roomService->store($request);

            return response()->json([
                'result' => 'successful',
                'data' => $saveRoom,
                'message' => 'Succesfully created a room!'

            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
    /**
     * Endpoint to create multiple rooms.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function massCreate(Request $request)
    {
        try {
            $saveRooms = $this->roomService->massCreate($request);
            return response()->json([
                'result' => 'successful',
                'data' => $saveRooms,
                'message' => 'Succesfully created rooms!'

            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }

    }

    public function update(CreateRoomRequest $request, $id)
    {
        try {
            $updateRoom = $this->roomService->update($request);

            return response()->json([
                'result' => 'successful',
                'data' => $updateRoom,
                'message' => 'Succesfully updated room!'

            ], 200);


        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }

}
