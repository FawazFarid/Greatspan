<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['driver_id'];
    
    public function consignee(){
        return $this->belongsTo('App\Consignee');
    }
    
    public function vessel(){
        return $this->belongsTo('App\Vessel');
    }
    
    public function driver(){
        return $this->belongsTo('App\Driver');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
