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
    Schema::create('patient_appointment_record', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->uuid('user_id');
        $table->uuid('appointment_id');
        $table->uuid('clinic_id');
        $table->uuid('doctor_user_id');
        $table->enum('status', ['PENDING', 'CONFIRMED', 'CANCELLED'])->default('PENDING');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        $table->foreign('doctor_user_id')->references('id')->on('users')->onDelete('cascade');
        
    });
}

public function down()
{
    Schema::dropIfExists('patient_appointment_record');
}

};
