<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('lab_test_parameters', function (Blueprint $table) {
            $table->bigIncrements('param_id', 20);
            $table->string("param", 200);
            $table->string("unit", 200)->nullable();
            $table->bigInteger('test_id')->length(20)->unsigned();
            $table->foreign('test_id')->references('test_id')->on('lab_test_names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_test_parameters');
    }
}
