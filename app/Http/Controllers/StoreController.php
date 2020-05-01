<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    public function create()
    {
        return view('stores.index');
    }

    public function index()
    {
        $stores = Store::all();
        return $stores;
    }

    public function store(Request $request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->save();
        return redirect('stores');
    }

    public function edit($id)
    {
        $store = Store::find($id);
        return view('stores.edit', ['store' => $store]);
    }
    public function update(Request $request, $id)
    {
        $dataStore = request()->except(['_token', '_method']);
        Store::where('id', '=', $id)->update($dataStore);
        return redirect('stores');
    }

    public function show($id)
    {
        $store = Store::find($id);
        return view('stores.index_profile', ['store' => $store]);
    }
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return back();
    }
}
