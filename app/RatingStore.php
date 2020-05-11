<?php

namespace App;

use App\Store;
use Illuminate\Support\Facades\Auth;

class RatingStore
{

    public function rateStore($storeId)
    {
        $store = Store::find($storeId);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = 5;
        $rating->user_id = Auth::id();
        $store->ratings()->save($rating);
        //dd(Store::find($storeId)->ratings);
        //$store->rating = $this->getAverageRating($storeId);
        /* $store->rating = $store->averageRating();
        var_dump($store->averageRating());
        $store->save(); */
    }

    public function getAverageRating($storeId)
    {
        $store = Store::find($storeId);
        return $store->averageRating();
    }
}
