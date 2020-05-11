<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Auth;
use App\Offer;
use App\Credentials;
use App\RatingStore;
use willvincent\Rateable\Rating;

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

        $storeOffers = Offer::where('store_id', $commerceEmail)->orderBy('created_at', 'desc')->get();

        return view('stores.misProductos', compact('storeOffers'));
    }

    public function index(Request $request)
    {
        $name = $request->get('searchName');
        $stores = Store::where('name', 'like', "%$name%")->paginate(5);
        return view('welcome', ['stores' => $stores]);
        //return (['stores' => $stores]);
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
        $storeUpdate = Store::findOrFail($id);
        /* ['name','user_id','description','adress','sector','avatar','facebook','instagram','horarios','category','phone'] */

        $storeUpdate->name = $request->name;
        $storeUpdate->description = $request->description;
        $storeUpdate->address = $request->address;
        $storeUpdate->sector = $request->sector;
        $storeUpdate->facebook = $request->facebook;
        $storeUpdate->instagram = $request->instagram;
        $storeUpdate->horarios = $request->horarios;
        $storeUpdate->category = $request->category;
        $storeUpdate->phone = $request->phone;

        $storeUpdate->update();

        return redirect('stores/miPerfil')->with('success', 'Se han modificado los datos Correctamente');
    }
    public function updateImage(Request $request, $id)
    {
        $storeUpdate = Store::findOrFail($id);
        /* ['name','user_id','description','adress','sector','avatar','facebook','instagram','horarios','category','phone'] */

        if ($request->has('avatar')) {
            $storeUpdate->avatar = $request->file('avatar')->store('public');
        } else {
            $storeUpdate->avatar = $storeUpdate->avatar;
        }


        $storeUpdate->update();

        return redirect('stores/miPerfil')->with('success', 'Se han modificado los datos Correctamente');
    }

<<<<<<< HEAD
    public function registerTwo(Request $request, $id)
    {
=======
    public function registerTwo(Request $request, $id){
>>>>>>> 353ec50107d109104c6040c78a26e1dc6c2809d1
        $storeUpdate = Store::findOrFail($id);
        /* ['name','user_id','description','adress','sector','avatar','facebook','instagram','horarios','category','phone'] */

        $storeUpdate->name = $request->name;
        $storeUpdate->address = $request->address;
        $storeUpdate->category = $request->category;
        $storeUpdate->phone = $request->phone;

        $storeUpdate->update();

        return redirect('stores/miPerfil')->with('success', 'Se han guardado tus datos Correctamente');
    }
    public function show($id)
    {
        $store = Store::find($id);

        $credencialStore = Credentials::where('store_id', $id)->get();
        $credentials = $credencialStore[0];
        /*  var_dump($storeCredentials); */
        return view('stores.index_profile', ['store' => $store, 'credentials' => $credentials]);
    }
    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return back();
    }

    public function setPuntuacion($rate)
    {
        $rating = new RatingStore();
        //$storeId =
        $rating->rateStore(1, $rate);
        return redirect('/');
    }

    public function getPuntuacion($storeId)
    {
        $rating = new RatingStore();
        $rate = $rating->getAverageRating($storeId);
        return $rate;
    }
}
