<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateTrigger extends Migration {

    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER Deleted_Products AFTER DELETE ON `products` FOR EACH ROW
            BEGIN
                INSERT INTO deleted_products (`old_product_name`, `old_product_type`,`old_product_details`,`old_price`, `created_at`,`updated_at`) 
                VALUES (OLD.product_name, OLD.product_type,OLD.product_details,OLD.price,now(),null);
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }
}
