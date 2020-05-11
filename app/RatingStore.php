<?php

namespace App;

use App\Store;
use Illuminate\Support\Facades\Auth;

class RatingStore
{

    public function rateStore($storeId, $rate)
    {
        $store = Store::find($storeId);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $rate;
        $rating->user_id = Auth::id();
        $store->ratings()->save($rating);
        $store->rating = $store->averageRating();
        $store->sum_rating = $store->sum_rating + $rate;
        $store->save();
    }

    public function getAverageRating($storeId)
    {
        $store = Store::find($storeId);
        return $store->averageRating();
    }
}
