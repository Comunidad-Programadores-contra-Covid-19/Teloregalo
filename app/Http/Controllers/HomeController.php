<?php

namespace App\Http\Controllers;

use \App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\DB;

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
