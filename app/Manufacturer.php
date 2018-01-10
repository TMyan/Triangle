<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function phones() {
        $this->hasMany('App\Phone');
    }

    public function computers() {
        $this->hasMany('App\Computer');
    }

    public function tablets() {
        $this->hasMany('App\Tablet');
    }

    public function smartWatches() {
        $this->hasMany('App\SmartWatch');
    }

    public function accessories() {
        $this->hasMany('App\Accessories');
    }
}
