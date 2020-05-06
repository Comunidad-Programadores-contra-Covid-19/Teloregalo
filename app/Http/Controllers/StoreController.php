<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Auth;
use App\Offer;

class StoreController extends Controller
{

    public function renderPerfil()
    {
        return view('stores.miPerfil');
    }
    public function renderVentas()
    {
        return view('stores.misVentas');
    }
    public function renderProductos()
    {
        
        $commerceEmail = Auth::user()->store->id;
        $storeOffers = Offer::where('store_id', $commerceEmail)->orderBy('created_at','desc')->get();
        
        return view('stores.misProductos',compact('storeOffers'));
    }

     public function index()
    {
        $stores = Store::all();
        return $stores;
    } 

/*     public function store(Request $request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->save();
        return redirect('stores');
    } */

/*     public function edit($id)
    {
        $store = Store::find($id);
        return view('stores.edit', ['store' => $store]);
    } */
    public function update(Request $request, $id)
    {
        $dataStore = request()->except(['_token', '_method']);
        
        Store::where('id', '=', $id)->update($dataStore);
        return redirect('stores/miPerfil')->with('success', 'Se han modificado los datos Correctamente');
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
