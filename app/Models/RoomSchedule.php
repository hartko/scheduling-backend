<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSchedule extends Model
{
    use HasFactory;
    protected $fillable = ["roomId", "sectionId", "subjectId","startTime","endTime","teacherId", "day"];

}
