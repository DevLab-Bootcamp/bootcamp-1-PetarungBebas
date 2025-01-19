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
        Schema::create('patient_drugs', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->uuid('patient_diagnose_id'); 
            $table->json('drugs');
            $table->json('icds');
            $table->text('description')->nullable(); 
            $table->timestamps(); 
            $table->softDeletes();
            
            $table->foreign('patient_diagnose_id')->references('id')->on('patient_diagnose')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_drugs');
    }
};
