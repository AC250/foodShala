<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function User(){
        return $this->belongsToMany('App\User');
    }
    
    public function food(){
        return $this->belongsToMany('App\foodItem');
    }
}
