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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('ticket_number')->unique();
            $table->foreignId('purok_id');
            $table->foreignId('waste_id');
            $table->foreignId('violation_id');
            $table->dateTime('date_time');
            $table->string('file_path');
            $table->string('status')->default('pending');
            $table->longText('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
