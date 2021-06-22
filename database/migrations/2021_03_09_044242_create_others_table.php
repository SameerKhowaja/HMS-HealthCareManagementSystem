<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->bigIncrements('other_id', 20);
            $table->bigInteger('primary_id')->length(20)->unsigned()->unique();
            $table->foreign('primary_id')->references('primary_id')->on('hospital_datas')->onDelete('cascade');
            $table->bigInteger('role_id')->length(20)->unsigned()->unique();
            $table->foreign('role_id')->references('role_id')->on('other_roles')->onDelete('cascade');

            $table->boolean('createPatient')->default(false);
            $table->boolean('viewPatient')->default(false);
            $table->boolean('editPatient')->default(false);
            $table->boolean('deletePatient')->default(false);
            $table->boolean('viewDocTime')->default(false);
            $table->boolean('editDocTime')->default(false);
            $table->boolean('viewAppointment')->default(false);
            $table->boolean('viewLabTest')->default(false);
            $table->boolean('createRoomBed')->default(false);
            $table->boolean('viewRoomBed')->default(false);
            $table->boolean('editRoomBed')->default(false);
            $table->boolean('deleteRoomBed')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('others');
    }
}
