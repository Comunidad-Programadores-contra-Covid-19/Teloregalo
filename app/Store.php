<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
