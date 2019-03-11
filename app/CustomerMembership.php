<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerMembership extends Model
{
    public function customers(){
        return $this->hasMany('App\User','user_id');
    }


}
