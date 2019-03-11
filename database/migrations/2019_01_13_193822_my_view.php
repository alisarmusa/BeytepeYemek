<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MyView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW menuView AS SELECT product_name FROM products WHERE product_type="Menü" ' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW menuView' );
    }
}
