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
        Schema::create('room_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('roomId');
            $table->string('sectionId');
            $table->string('subjectId')->nullable();
            $table->string('startTime');
            $table->string('endTime');
            $table->string('teacherId')->nullable();
            $table->string('day');
            $table->smallInteger('unit')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_schedules');
    }
};
