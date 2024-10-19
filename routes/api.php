<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SchedulingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/excel/read', [ExcelController::class, 'readExcel']);

Route::post('/room', [RoomController::class, 'massCreate']);
Route::get('/rooms', [RoomController::class, 'index']);
Route::put('/rooms/{id}', [RoomController::class, 'update']);

Route::post('/teacher', [TeacherController::class, 'massCreate']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::put('/teachers/{id}', [TeacherController::class, 'update']);

Route::post('/schedule', [ScheduleController::class, 'massCreate']);
Route::get('/schedules', [ScheduleController::class, 'index']);
Route::put('/schedules/{id}', [ScheduleController::class, 'update']);
Route::get('/schedule/{day}', [ScheduleController::class, 'show']);

Route::post('/course', [CourseController::class, 'massCreate']);
Route::get('/courses', [CourseController::class, 'index']);
Route::put('/courses/{id}', [CourseController::class, 'update']);

Route::post('/subject', [SubjectController::class, 'massCreate']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::put('/subjects/{id}', [SubjectController::class, 'update']);

Route::post('/classSection', [SectionController::class, 'massCreate']);
Route::get('/classSections', [SectionController::class, 'index']);
Route::put('/classSection/{id}', [SectionController::class, 'update']);

Route::get('/scheduling', [SchedulingController::class, 'index']);
