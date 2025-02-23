<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSchedule extends Model
{
    use HasFactory;
    protected $fillable = ["teacherId", "startTime", "endTime", "day","hasBreak","brkStartTime","brkEndTime"];

}
