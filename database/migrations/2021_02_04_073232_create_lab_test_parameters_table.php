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
        Schema::create('lab_test_parameters', function (Blueprint $table) {
            $table->bigIncrements('param_id', 20);
            $table->string("param", 200);
            $table->string("unit", 200)->nullable();
            $table->integer('test_id')->length(11)->unsigned();
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
