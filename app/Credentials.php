<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    //
    protected $fillable = ['store_id',"access_token","token_type","expires_in","scope","refresh_token"];
    

}

