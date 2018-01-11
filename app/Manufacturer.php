<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function phones() {
       return $this->hasMany('App\Phone');
    }

    public function computers() {
        return $this->hasMany('App\Computer');
    }

    public function tablets() {
        return $this->hasMany('App\Tablet');
    }

    public function smartWatches() {
        return $this->hasMany('App\SmartWatch');
    }

    public function accessories() {
        return $this->hasMany('App\Accessories');
    }
}
