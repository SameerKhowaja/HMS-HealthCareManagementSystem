<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('patient_name');
            $table->string('patient_password');
            $table->string('last_name');
            $table->bigInteger('CNIC');
            $table->string('gender');
            $table->string('address');
            $table->bigInteger('contact_no');
            $table->date('DOB');
            $table->string('email');
            $table->date('date_admitted');
            $table->integer('admission_id');
            $table->string('room'); //Romm Allocated 
            $table->integer('PID'); //Admission ID
            $table->date('date_discharged');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
