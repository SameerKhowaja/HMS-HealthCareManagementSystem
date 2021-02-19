<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements("medicine_id", 20);
            $table->string('medicine',400);
            $table->string('medicine_type',400)->nullable;
            $table->string('drug_use',400)->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
