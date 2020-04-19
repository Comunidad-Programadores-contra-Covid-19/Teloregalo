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
    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->save();
        return redirect('stores');
    }
}
