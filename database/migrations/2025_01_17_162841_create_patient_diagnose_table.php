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
    Schema::create('patient_diagnose', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->uuid('patient_medical_record_id');
        $table->uuid('user_id');
        $table->text('diagnose')->nullable();
        $table->text('teraphy')->nullable();
        $table->text('medical_letter_porpuse')->nullable();
        $table->text('medical_letter_result')->nullable();
        $table->timestamps();

        $table->foreign('patient_medical_record_id')->references('id')->on('patient_appointment_record')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('patient_diagnose');
}

};
