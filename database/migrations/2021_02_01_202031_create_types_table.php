<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->integer('type_id', 11);
            $table->string('type_name', 100)->unique();
        });

        // Insert some stuff
        DB::table('types')->insert(
            array(
                ['type_name'=>'Admin'],
                ['type_name'=>'Patient'],
                ['type_name'=>'Doctor'],
                ['type_name'=>'Receptionist'],
                ['type_name'=>'Lab Technician'],
                ['type_name'=>'Other']
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
        Schema::dropIfExists('types');
    }
}
