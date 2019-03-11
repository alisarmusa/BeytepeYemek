<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RichOrderView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement( 'CREATE VIEW richOrderView AS SELECT DISTINCT name FROM orders,products WHERE orders.product_id = products.id and (orders.quantity*products.price>50)' );
    }

    public function down()
    {
        DB::statement( 'DROP VIEW richOrderView' );
    }
}
