<?php
namespace App\Traits;

trait ExcelTrait
{

    public function excelKey($excelType)
    {
        $roomKeys = ['roomId', 'name', 'capacity', 'floor', 'building'];
        $teacherKeys = ['teacherId', 'firstname', 'middlename', 'lastname'];
        $scheduleKeys = ['day', 'startTime', 'endTime'];


        switch ($excelType) {
            case 'Room':
                return $roomKeys;
            case 'Teachers':
                return $teacherKeys;
            case 'Schedules':
                return $scheduleKeys;
            default:
                return [];
        }

    }
}