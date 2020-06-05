<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
class ClientController extends Controller
{
    public function renderPerfil(){
        $userProfile = Auth::user();
        return View('clientes.perfil_cliente',compact('userProfile'));
    }

    public function renderMisRegalos(){
        $userProfile = Auth::user();
        return View('clientes.mis_regalos');
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
            
            if($user->reports > 5){ // Constante arbitraria
                // Hacer algo
                ;
            }

            $user->update();

            $success = true;
        }
        return response()->json(['success' => $success]);
    }
}
