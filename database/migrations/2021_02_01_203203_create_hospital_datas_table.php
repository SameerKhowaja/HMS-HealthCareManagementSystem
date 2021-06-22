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
            $table->bigIncrements("primary_id", 20);
            $table->integer('type_id')->length(11);
            $table->string("fname", 100);
            $table->string("lname", 100);
            $table->string("cnic", 100);
            $table->string("email_id", 200);
            $table->string("gender", 15);
            $table->string("phone_number", 30);
            $table->string("city", 100)->nullable();
            $table->string("address", 500)->nullable();
            $table->date("dob")->nullable();
            $table->string("password", 100);
            $table->binary("image")->nullable();    // Change blob to longblob from database
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
            $table->foreign('type_id')->references('type_id')->on('types')->onDelete('cascade');
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
