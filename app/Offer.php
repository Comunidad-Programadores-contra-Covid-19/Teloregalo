<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name_offer', 'description_offer', 'cost','amount','total_amount', 'store_id'
    ];
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
