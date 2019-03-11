<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnaYemekView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW anaYemekView AS SELECT product_name FROM products WHERE product_type="Ana Yemek" ' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW anaYemekView' );
    }
}
