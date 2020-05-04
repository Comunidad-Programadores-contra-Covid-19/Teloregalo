<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Otp extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'otp_pass', 'otp_timestamp', 'user_id', 'store_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
