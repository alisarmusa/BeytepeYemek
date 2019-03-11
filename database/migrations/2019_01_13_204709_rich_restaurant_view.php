<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RichRestaurantView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW richRestaurantView AS SELECT name FROM restaurants WHERE account>1000' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW richRestaurantView' );
    }
}
