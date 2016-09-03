<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $primaryKey = "imo";
    
    public function booking(){
        return $this->hasOne('App\Booking');
    }
}
