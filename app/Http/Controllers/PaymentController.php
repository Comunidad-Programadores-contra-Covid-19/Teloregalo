<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

require __DIR__  . '/vendor/autoload.php';


MercadoPago\SDK::setAccessToken("TEST-4473036575801903-042214-90e96cb43dab864cda0953e27f5c8539-553262681"); // On Sandbox

class PaymentController extends Controller
{
    public function recibirPost(Request $request)
    {

        $token = $_REQUEST["token"];
        $payment_method_id = $_REQUEST["payment_method_id"];
        $installments = $_REQUEST["installments"];
        $issuer_id = $_REQUEST["issuer_id"];
        //...
        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = 145;
        $payment->token = $token;
        $payment->description = "Practical Wooden Plate";
        $payment->installments = $installments;
        $payment->payment_method_id = $payment_method_id;
        $payment->issuer_id = $issuer_id;
        $payment->payer = array(
            "email" => "sincere@yahoo.com"
        );
        // Guarda y postea el pago
        $payment->save();
        //...
        // Imprime el estado del pago
        echo $payment->status;
        //...
    }
}

   /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function destroy($id)
    {
        //
    } 
    */
