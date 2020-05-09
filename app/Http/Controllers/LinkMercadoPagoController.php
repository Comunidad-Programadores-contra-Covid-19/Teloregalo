<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Auth;
use App\Offer;
use GuzzleHttp\Client;
use App\Credentials;

class LinkMercadoPagoController extends Controller
{
    public function linked(Request $request){
        var_dump($request->code);
        $store_id = Auth::user()->store->id;
        $ifExist= Credentials::where('store_id',$store_id)->first();
        if($ifExist){
            $messag="Tu cuenta ya esta vinculada";
        }else{

            $client = new Client();
            $response = $client->post("https://api.mercadopago.com/oauth/token", [
                // un array con la data de los headers como tipo de peticion, etc.
                'headers' => ['accept' => 'application/json','content-type' => 'application/x-www-form-urlencoded'],
                // array de datos del formulario
                'form_params' => [
                    'client_id'=>'5841017781823689' , //teloregalo credeencial
                    'client_secret'=>'9E46rD3IlnFAe1aXfsuTkPCx0gTWqsAq' , //teloregalo credeencial
                    'grant_type'=>'authorization_code' ,
                    'code'=> $request->code ,
                    'redirect_uri'=>'http://localhost:8000/procesar-pago',
                ]
            ]);
    
            $statusCode = $response->getStatusCode();
            $content = json_decode($response->getBody()->getContents());
           
    
      
          
                $credentials = Credentials::create([
                    'store_id'=> $store_id,
                    "access_token"=>$content->access_token,
                    "token_type"=>$content->token_type,
                    "expires_in"=>$content->expires_in,
                    "scope"=>$content->scope,
                    "refresh_token"=>$content->refresh_token,
                ]);
                $credentials->save();
                $messag="Tu cuenta se vinculo con exito";
        }
        
        

       return redirect('stores/miPerfil')->with('success', $messag);
    }

    public function verificar(Request $request){
        $access_token = $request->ofert; // token de comercio
        $idPago=$request->preference_id;  // id del pago realizado
        $payStatus=$request->payment_status;  // estado del pago realizado

  
        if($payStatus =='approved') {
            $client = new Client();
            $response = $client->get("https://api.mercadopago.com/checkout/preferences/".$idPago."?access_token=".$access_token, [
                // un array con la data de los headers como tipo de peticion, etc.
                'headers' => ['accept' => 'application/json','content-type' => 'application/x-www-form-urlencoded'],
                // array de datos del formulario
            ]);
    
            $statusCode = $response->getStatusCode();
            $content = json_decode($response->getBody()->getContents());
            
            $ids=$content->items[0];
            
            echo $ids->id;

            $offer = Offer::find($ids->id);
            $offer->amount = 1 + $offer->amount;
            $offer->save(); 
            //To stay in /edit when updated
            //return back()->with('message','Oferta editada.');
             return redirect('/agradecimiento')->with('success', 'Tu pago se ah efectuado con exito!.'); 
        }else{
             echo 'error';
         } 
      
    }
}