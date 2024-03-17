<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ScheduleService;

class ScheduleController extends Controller
{
   
    protected $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    /**
     * Endpoint to fetch a list of schedule.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {

            $schedule = $this->scheduleService->list($request->input('search'));

            return response()->json([
                'result' => 'success',
                'data' => $schedule
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
    /**
     * Endpoint to create multiple schedule.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function massCreate(Request $request)
    {
        try {
            $saveRooms = $this->scheduleService->massCreate($request);
            return response()->json([
                'result' => 'successful',
                'data' => $saveRooms,
                'message' => 'Succesfully created schedule!'

            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }

    }

    public function update($request, $id)
    {
        try {
            $updateRoom = $this->scheduleService->update($request);

            return response()->json([
                'result' => 'successful',
                'data' => $updateRoom,
                'message' => 'Succesfully updated schedule!'

            ], 200);


        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
}
