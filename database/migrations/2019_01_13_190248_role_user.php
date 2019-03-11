<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login.deleted_products', function (Blueprint $table) {
            $table->string('old_product_name');
            $table->string('old_product_type');
            $table->text('old_product_details');
            $table->integer('old_price');
            $table->rememberToken();
            $table->timestamps();
    });

 }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
