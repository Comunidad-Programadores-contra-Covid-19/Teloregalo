<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserMailSend extends Model
{
    use Notifiable;
    protected $fillable = [
        'name', 'email','offer_id'
    ];

    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
