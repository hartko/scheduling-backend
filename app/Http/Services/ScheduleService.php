<?php
namespace App\Http\Services;

use App\Models\Schedule;

class ScheduleService
{
    /**
     * Get list of schedules.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($search)
    {
        // Retrieve and return all schedules
        $schedules = Schedule::where('day', 'like', '%' . $search . '%')
            ->orWhere('startTime', 'like', '%' . $search . '%')
            ->orWhere('endTime', 'like', '%' . $search . '%')
            ->orderByRaw('FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")')
            ->orderByRaw("STR_TO_DATE(startTime, '%h:%i %p')")
            ->get()
            ->groupBy('day')
            ->makeHidden(['id', 'created_at', 'updated_at']);

        return $schedules;
    }

    public function show($day)
    {
        // Retrieve and return all schedules
        $schedule = Schedule::where('day', 'like', '%' . $day . '%')
            ->orderByRaw("STR_TO_DATE(startTime, '%h:%i %p')")
            ->get()
            ->makeHidden(['id', 'created_at', 'updated_at']);

        return $schedule;
    }

    /**
     * Mass create schedules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function massCreate($request)
    {
        var_dump($request->input('schedules'));
        // Parse the input JSON string into an array of schedule objects
        $schedules = json_decode($request->input('schedules'));
        // Iterate over each schedule object and create a new schedule record
        foreach ($schedules as $schedule) {
            Schedule::create((array) $schedule);
        }
        return true;
    }

    public function update($request)
    {
        $updateSchedule = Schedule::where('id', $request->scheduleId)->update([
            'day' => $request->day,
            'startTime' => $request->startTime,
            'endTime' => $request->middlename,
        ]);

        return $updateSchedule;
    }
}