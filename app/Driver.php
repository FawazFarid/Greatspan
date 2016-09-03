<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function bookings(){
        return $this->hasOne('App\Booking');
    }
}
