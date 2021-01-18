<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor_name');
            $table->string('doctor_password');
            $table->string('last_name');
            $table->bigInteger('CNIC');
            $table->string('gender');
            $table->string('address');
            $table->bigInteger('contact_no');
            $table->date('DOB');
            $table->string('email');
            $table->string('specialist');
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
        Schema::dropIfExists('doctors');
    }
}
