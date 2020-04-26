<?php

namespace App\Http\Controllers;
echo 'Pagado';
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('offers.list',compact('offers'));
    }
}
