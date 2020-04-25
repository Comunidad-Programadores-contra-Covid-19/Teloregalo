<?php

namespace App\Http\Controllers;
use \App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\StoreController;
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
        $stores = Store::all();
        
        return view('welcome',  [
            'stores'=>$stores 
        ]);
    }


}
