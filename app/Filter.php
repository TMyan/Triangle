<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function categories() {
        $this->belongsToMany('App\Category');
    }
}
