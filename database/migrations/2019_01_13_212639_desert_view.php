<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesertView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW desertView AS SELECT product_name FROM products WHERE product_type="Tatlı" ' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW desertView' );
    }
}
