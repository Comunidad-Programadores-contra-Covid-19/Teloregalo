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
                    'client_id'=>'5841017781823689' ,
                    'client_secret'=>'9E46rD3IlnFAe1aXfsuTkPCx0gTWqsAq' ,
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
}