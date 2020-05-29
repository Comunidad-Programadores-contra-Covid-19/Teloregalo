<?php

namespace App\Http\Controllers;

use \App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\registroHeroeEmail;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*    public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()){
            $usuario=Auth::user();
            if($usuario->rol=='client' && $usuario->email_verified_at && $usuario->email_send == '0'){
                    Mail::to($usuario->email)->send(new registroHeroeEmail($usuario->name)); 
                    $user = User::findOrFail($usuario->id);
                    $user->email_send ='1';
                    $user->update();
            }
        }
        
        

        $stores = DB::table('stores')
            ->join('credentials', 'stores.id', '=', 'credentials.store_id')
            ->select('stores.*')
            ->orderBy('rating', 'DESC')
            ->orderBy('sum_rating', 'DESC')
            ->get();

        return view('welcome',  [
            'stores' => $stores
        ]);
    }
}