<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
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
