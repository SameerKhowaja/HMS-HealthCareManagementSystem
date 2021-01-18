<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->increments('lab_test_id');
            $table->integer('test_id');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->integer('technician_id');
            $table->date('test_date');
            $table->time('test_time');
            $table->date('result_date');
            $table->time('result_time');
            $table->string('result_posted'); //Result arrived yes/no
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_tests');
    }
}
