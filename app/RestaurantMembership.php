<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMembership extends Model
{


    public function restaurants(){
        return $this->hasMany('App\Restaurant','restaurant_id');
    }

}
