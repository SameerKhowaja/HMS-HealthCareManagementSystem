<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tech_name');
            $table->string('tech_password');
            $table->string('gender');
            $table->string('DOB');
            $table->bigInteger('CNIC');
            $table->string('contact_no');
            $table->string('description'); //qualification or other details
            $table->string('email');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratorists');
    }
}
