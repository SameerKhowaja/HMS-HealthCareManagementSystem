<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::enableForeignKeyConstraints();
        Schema::create('treatments', function (Blueprint $table) {
            $table->bigIncrements("treatment_id", 20);
            $table->string('medical_condition',400);
            $table->string('comment',1000)->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->foreign('appointment_id')->references('appointment_id')->on('appointment_requests')->onDelete('set null');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
