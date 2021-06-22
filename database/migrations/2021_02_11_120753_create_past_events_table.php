<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('past_events', function (Blueprint $table) {
            $table->bigIncrements('event_id', 30);
            $table->string("event_type", 100);  // add-update-delete
            $table->bigInteger('primary_id')->length(20)->unsigned();
            $table->string('description', 150)->nullable();
            $table->date('event_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->time('event_time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('primary_id')->references('primary_id')->on('hospital_datas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('past_events');
    }
}
