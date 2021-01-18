<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_results', function (Blueprint $table) {
            $table->increments('appointment_result_id');
            $table->integer('appointment_id');
            $table->string('prescribe_medicine');
            $table->string('prescribe_test');
            $table->string('description');
            $table->timestamps('result_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_results');
    }
}
