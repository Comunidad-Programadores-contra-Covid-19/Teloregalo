<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function otp()
    {
        return $this->hasOne('App\Otp');
    }
}
