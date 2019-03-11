<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function restaurantMembership(){
        return $this->belongsTo('App\RestaurantMembership');
    }
    public function restaurantPayment(){
        return $this->belongsTo('App\RestaurantPayment');
    }
    public function comment(){
        return $this->hasMany('App\Comment','restaurant_id');
    }

}
