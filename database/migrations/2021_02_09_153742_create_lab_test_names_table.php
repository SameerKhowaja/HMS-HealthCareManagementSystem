<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_test_names', function (Blueprint $table) {
            $table->bigIncrements('test_id', 20);
            $table->string("test_name", 200);
            $table->string("test_type", 200)->nullable();
            $table->string("test_sample", 200)->nullable();
            $table->string("methodology", 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_test_names');
    }
}
