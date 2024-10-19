<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teacher_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('teacherId');
            $table->string('startTime');
            $table->string('endTime');
            $table->string('hasBreak')->default('true');
            $table->string('brkStartTime')->default('12:00 PM');
            $table->string('brkEndTime')->default('1:00 PM');
            $table->json('day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_schedules');
    }
};
