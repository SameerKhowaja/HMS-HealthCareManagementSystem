<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_test_reports', function (Blueprint $table) {
            $table->increments('lab_report_id');
            $table->integer('lab_test_id');
            $table->blob('report_image');
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
        Schema::dropIfExists('lab_test_reports');
    }
}
