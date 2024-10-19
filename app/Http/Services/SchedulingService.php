<?php

namespace App\Http\Services;

use App\Models\Section;
use App\Models\Room;
use App\Models\TeacherSchedule;
use App\Models\TeacherSubject;
use App\Models\RoomSchedule;
use App\Models\ClassSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;
// use App\Models\Schedule;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class SchedulingService
{
    public function autoScheduleClasses()
    {
        $excludeSection = ["TVL12A", "HUMSS12B", "HUMSS12A", "STEM12", "ABM12", "GAS12", "TVL11", "HUMSS11", "STEM11", "ABM11", "GAS11B", "GAS11A", "NG10A", "NG9A", "NG8A", "NG7A", "DG10C", "DG10B", "DG10A", "DG9B", "DG9A", "DG8B", "DG8A", "DG7B", "DG7A"];
        $classes = Section::whereNotIn('code', $excludeSection)->get()->toArray();
        $rooms = Room::all()->toArray();
        // $rooms = Room::all();

        $scheduleStart = Carbon::parse('7:00 AM');

        $subjects = Subject::all()->toArray();
        foreach ($subjects as $subject) {
            $array = [];
            $subjectId = Str::replace(' ', '', $subject['code']);
            $classSubjects = ClassSubject::where('subjectId', $subjectId)->get();
            if ($classSubjects->isNotEmpty()) {
                foreach ($classSubjects as $classSubject) {
                    foreach ($rooms as $room) {
                        
                        $roomSchedule = RoomSchedule::where('sectionId', $classSubject->sectionId)->where('subjectId', $subject['code']);
                        if ($classSubjects->isNotEmpty()) {

                            if ($roomSchedule->sum('unit') <= $subject['unit']) {

                                $array[] = self::checkTimeSlots($room,$classSubject->sectionId,$classSubject->subjectId);


                            }

                        } else {

                        }
                    }
                }


            }

            return $array;
         
        }
    }

    private function checkTimeSlots($room,$sectionId,$subjectId)
    {
        $start = Carbon::createFromTimeString('07:00:00');
        $end = Carbon::createFromTimeString('19:00:00');
        $interval = CarbonInterval::hour();

        $period = new \DatePeriod($start, $interval, $end);

        $availableSlots = [];
        $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        foreach ($days as $day) {

            foreach ($period as $time) {
                $startTime = new Carbon($time);
                $endTime = new Carbon($time);
                $endTimeAdd = $endTime->addHour();
                if (is_null(self::findOverlappingSchedules($startTime->format('H:i:s'), $endTime->format('H:i:s'), $day, $room))) {
                    if ($startTime->format('H:i:s') !== '12:00:00' && $endTime->format('H:i:s') !== '13:00:00') {

                        $availableSlots[] = ['startTime' => $startTime->format('H:i:s'), 'endTime' => $endTime->format(' H:i:s'), 'day' => $day, 'roomId' => $room['roomId'],'sectionId' => $sectionId, 'subjectId' => $subjectId ];
                    }
                }
                // Subtract the interval to revert to the correct start time for the next iteration
                $time->sub($interval);
            }
        }

        return $availableSlots;

    }

    private function findOverlappingSchedules($startTime, $endTime, $day, $room)
    {
        $startTimeFormatted = date('H:i:s', strtotime($startTime));
        $endTimeFormatted = date('H:i:s', strtotime($endTime));
        // echo $day, $startTimeFormatted, $endTimeFormatted;
        return RoomSchedule::where('day', $day)
            ->where('roomId', $room['roomId'])
            ->where('startTime', $startTimeFormatted)
            ->where('endTime', $endTimeFormatted)
            ->first();

    }

}
