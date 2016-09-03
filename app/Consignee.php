<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    public function bookings(){
        return $this->hasMany('App\Booking');
    }
}