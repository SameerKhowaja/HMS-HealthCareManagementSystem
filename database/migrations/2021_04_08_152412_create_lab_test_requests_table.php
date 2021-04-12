<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_test_requests', function (Blueprint $table) {
            $table->bigIncrements("test_req_id", 20);
            $table->unsignedBigInteger('patient_id');
            $table->string('test_names',1000);
            $table->string('test_performed',1000)->nullable();
            $table->foreign('patient_id')->references('patient_id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('lab_test_requests');
    }
}
