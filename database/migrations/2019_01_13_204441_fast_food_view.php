<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FastFoodView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW fastFoodView AS SELECT product_name FROM products WHERE product_type="Fast Food" ' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW fastFoodView' );
    }
}
