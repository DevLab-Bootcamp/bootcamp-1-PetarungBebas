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
        Schema::create('patient_screening_inspection', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->uuid('patient_medical_record_id'); 
            $table->uuid('user_id'); 
            $table->float('height')->nullable(); 
            $table->float('weight')->nullable(); 
            $table->integer('heart_rate')->nullable(); 
            $table->float('temperature')->nullable(); 
            $table->float('blood_sugar')->nullable(); 
            $table->float('cholesterol')->nullable(); 
            $table->text('others')->nullable(); 
            $table->timestamps(); 
            $table->softDeletes();
            
            $table->foreign('patient_medical_record_id')->references('id')->on('patient_appointment_record')->onDelete('cascade'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_screening_inspection');
    }
};
