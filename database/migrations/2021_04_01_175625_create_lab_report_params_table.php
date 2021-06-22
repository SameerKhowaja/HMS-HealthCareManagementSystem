<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabReportParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_report_params', function (Blueprint $table) {
            $table->bigIncrements('report_param_id', 20);
            $table->string("param_value", 200);
            $table->bigInteger('param_id')->length(20)->unsigned();
            $table->foreign('param_id')->references('param_id')->on('lab_test_parameters')->onDelete('cascade');
            $table->bigInteger('report_id')->length(20)->unsigned();
            $table->foreign('report_id')->references('report_id')->on('lab_test_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_report_params');
    }
}
