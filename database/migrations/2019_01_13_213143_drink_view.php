<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DrinkView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW drinkView AS SELECT product_name FROM products WHERE product_type="İçecek" ' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW drinkView' );
    }
}
