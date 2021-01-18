<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_datas', function (Blueprint $table) {
            $table->increments('primary_id');
            $table->integer('type_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('cnic');
            $table->string('email_id');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('address');
            $table->date('dob');
            $table->string('password');
            $table->blob('image');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_datas');
    }
}
