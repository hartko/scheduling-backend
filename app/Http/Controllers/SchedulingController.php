<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SchedulingService;
use App\Jobs\AutoScheduleClasses;
use App\Models\RoomSchedule;

class SchedulingController extends Controller
{
    protected $schedulingService;

    public function __construct(SchedulingService $schedulingService)
    {
        $this->schedulingService = $schedulingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $schedules = RoomSchedule::orderBy('startTime')->get();
       $groupedSchedules = $schedules->groupBy('roomId');
       return response()->json([
        'result' => 'success',
        'data' => $groupedSchedules
    ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        set_time_limit(500);
        $olo = AutoScheduleClasses::dispatch();
        // $schedule = $this->schedulingService->autoScheduleClasses();
        return response()->json([
            'result' => 'success',
            'data' => $olo
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
