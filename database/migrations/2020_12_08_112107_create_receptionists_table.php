<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptionists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('receptionist_name');
            $table->string('receptionist_password');
            $table->string('last_name');
            $table->date('DOB');
            $table->string('gender');
            $table->string('description'); //qualification or other details
            $table->string('email');
            $table->bigInteger('contact_no');
            $table->bigInteger('CNIC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptionists');
    }
}
