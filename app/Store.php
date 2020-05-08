<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','user_id','description','address','sector','avatar','facebook','instagram','horarios','category','phone'];

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }



}
