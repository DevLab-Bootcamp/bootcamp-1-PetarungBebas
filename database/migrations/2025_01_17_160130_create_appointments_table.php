<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->uuid('user_id');
        $table->uuid('schedule_id');
        $table->enum('type', ['DOCTOR', 'EVENT']);
        $table->text('anamnesis')->nullable();
        $table->enum('status', ['PENDING', 'CONFIRMED', 'CANCELLED'])->default('PENDING');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // Constraint untuk schedule_id bisa disesuaikan berdasarkan tabel yang sesuai (schedule_doctors atau schedule_events)
    });
}

public function down()
{
    Schema::dropIfExists('appointments');
}

};
