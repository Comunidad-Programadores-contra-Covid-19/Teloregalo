<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('id', 'ASC')->paginate();
        return view('stores.index', ['stores' => $stores]);
    }
}
