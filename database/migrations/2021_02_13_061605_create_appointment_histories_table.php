<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::enableForeignKeyConstraints();
        Schema::create('appointment_histories', function (Blueprint $table) {
            $table->bigIncrements("appointment_history_id", 20);
            $table->date('appointment_date');
            $table->string('day',10);
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->string('Description',400)->nullable();
            $table->boolean('confirm')->default(false);
            $table->string('status',400)->default("request pending");
            $table->time('start_time');
            $table->time('end_time');
            $table->foreign('appointment_id')->references('appointment_id')->on('appointment_requests')->onDelete('set null');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('appointment_histories');
    }
}
