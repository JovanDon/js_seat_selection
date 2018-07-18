<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paid');
            $table->enum('favourite_seat',['window','off-window']);
            $table->date('travel_date');
            $table->string('ticket_number');

            $table->unsignedInteger('passanger_id');
            $table->foreign('passanger_id')->references('id')->on('users');

            $table->unsignedInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedules');

            $table->timestamps();
            $table->enum('status',['activated','cancelled','used']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
