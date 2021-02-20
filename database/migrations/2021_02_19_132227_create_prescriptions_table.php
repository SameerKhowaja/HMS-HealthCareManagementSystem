<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::enableForeignKeyConstraints();
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements("prescription_id", 20);
            $table->unsignedBigInteger("treatment_id");
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('treatment_id')->references('treatment_id')->on('treatments')->onDelete('cascade');
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('cascade');
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
        Schema::dropIfExists('prescriptions');
    }
}
