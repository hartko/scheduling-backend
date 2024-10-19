<?php
namespace App\Traits;

trait ExcelTrait
{

    public function excelKey($excelType)
    {
        $roomKeys = ['roomId', 'name', 'capacity', 'floor', 'building'];
        $teacherKeys = ['teacherId', 'firstname', 'middlename', 'lastname'];
        $scheduleKeys = ['day', 'startTime', 'endTime',"hasBreakTime", "bktStartTime", "bktEndTime"];
        $courseKeys = ['courseId', 'name'];
        $subjectKeys = ['code', 'name','level','unit'];
        $classSectionKeys = ['code', 'name',"hasBreak", "startTime", "endtime"];


        switch ($excelType) {
            case 'Room':
                return $roomKeys;
            case 'Teachers':
                return $teacherKeys;
            case 'Schedules':
                return $scheduleKeys;
            case 'Course':
                return $courseKeys;
            case 'Subject':
                return $subjectKeys;
            case 'Section':
                    return $classSectionKeys;
            default:
                return [];
        }

    }
}