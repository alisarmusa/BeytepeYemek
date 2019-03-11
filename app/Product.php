<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders(){
        return $this->hasMany('App\Order','product_id');
    }

    public function restaurants(){
        return $this->hasMany('App\Restaurant','product_id');
    }
    public function menus(){
        return $this->hasMany('App\Menu','product_id');
    }
    public function snacks(){
        return $this->hasMany('App\Snack','product_id');
    }
    public function scoreboards(){
        return $this->hasMany('App\Scoreboard','product_id');
    }
}
