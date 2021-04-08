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
            $table->bigIncrements('report_id', 20);
            $table->string("result", 1000);
            $table->string("comment", 1000)->nullable();
            $table->bigInteger('test_id')->length(20)->unsigned();
            $table->foreign('test_id')->references('test_id')->on('lab_test_names')->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
            $table->BigInteger('technician_id')->length(20)->unsigned()->nullable();
            $table->foreign('technician_id')->references('technician_id')->on('lab_technicians')->onDelete('set null');
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
        Schema::dropIfExists('lab_test_reports');
    }
}
