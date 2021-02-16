<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements("admin_id", 20);
            $table->string("fname", 100);
            $table->string("lname", 100);
            $table->string("email_id", 200)->unique();
            $table->string("cnic", 100)->unique();
            $table->string("password", 100);
            $table->binary("image")->nullable();    // Change blob to longblob from database
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });

        // Insert some stuff
        DB::table('admins')->insert(
            array('fname'=>'Sameer',
            'lname'=>'Khowaja',
            'email_id'=>'sameerkhowaja@gmail.com',
            'cnic'=>'1000',
            'password'=>'pass'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
