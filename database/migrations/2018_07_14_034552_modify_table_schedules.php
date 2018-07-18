<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        Schema::table('schedules', function(Blueprint $table)
        {
            $table->dropColumn('departure_time');
        });
        Schema::table('schedules', function(Blueprint $table)
        {
            $table->string('departure_time');
        });
    
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function(Blueprint $table)
        {
            $table->dropColumn('departure_time');
        });
        Schema::table('schedules', function(Blueprint $table)
        {
            $table->time('departure_time');
        });
       
    }
}
