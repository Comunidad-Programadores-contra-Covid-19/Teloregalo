<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Store;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function renderPerfil(){
        $userProfile = Auth::user();
        return View('clientes.perfil_cliente',compact('userProfile'));
    }

    public function rating($id){

        $userProfile = Auth::user();
        if (Auth::user()->id==$id) {

            $stores = Store::join('otps','stores.id','=','otps.store_id')
              ->join('offers','stores.id','=','offers.store_id')
             ->select('stores.*','offers.name_offer as offer','otps.id as otps' )
             ->where('otps.user_id','=',Auth::user()->id)
             ->where('otps.is_used','=',1)
             ->where('otps.is_rating','=',0)
             ->orderBy('stores.id', 'desc')
             ->get();

             return view('clientes.rating', ['stores' => $stores]);
        } else {
            return redirect('/');
        }
    }
    public function updateImage(Request $request, $id)
    {
        $userUpdate = User::findOrFail($id);
        /* ['name','user_id','description','adress','sector','avatar','facebook','instagram','horarios','category','phone'] */
        if($request->has('avatar')) {
            $userUpdate->avatar = $request->file('avatar')->store('public');
        }else{
            $userUpdate->avatar=$userUpdate->avatar;
        }
        $userUpdate->update();
        return redirect('/mi-perfil')->with('success', 'Se han modificado los datos Correctamente');
    }

    public function updateHero(Request $request, $id)
    {
        $userUpdate = User::findOrFail($id);
        /* ['name','user_id','description','adress','sector','avatar','facebook','instagram','horarios','category','phone'] */

        $userUpdate->name = $request->name;
        $userUpdate->profesion= $request->profesion;

        $userUpdate->update();

        return redirect('/mi-perfil')->with('success', 'Se han modificado los datos Correctamente');
    }

    public function report($id){
        $success = false;

        $user = User::find($id);
        if($user){

            $user->reports++;

            $user->update();

            $success = true;
        }
        return response()->json(['success' => $success]);
    }
}
