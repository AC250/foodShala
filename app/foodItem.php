<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foodItem extends Model
{
    public function restaurants(){
        return $this->hasMany('App\User');
    }
    
    public function orders(){
        return $this->hasMany('App\order');
    }
}
