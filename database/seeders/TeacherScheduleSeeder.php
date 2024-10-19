<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            ['teacherId' => 'TC110', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC111', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC112', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC113', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC114', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC115', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC116', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC117', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC118', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC119', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC120', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC121', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC122', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC123', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
            ['teacherId' => 'TC124', 'startTime' => '7:00 AM', 'endTime' => '7:00 PM', 'day' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'])],
        ];

        foreach ($schedules as $schedule) {
            DB::table('teacher_schedules')->insert($schedule);
        }
    }
}
