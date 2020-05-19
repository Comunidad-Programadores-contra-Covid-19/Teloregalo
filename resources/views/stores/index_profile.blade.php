@extends('layouts.app')


@section('content')

<!-- Inicio contenedor -->
<div class="container">
    <!-- Inicio Bot車n "volver" -->
    <div class="volver">
        <a href="{{ url()->previous() }}"><  Volver</a>
    </div>
        <!-- Fin Bot車n "volver" -->
    <div class="row ">
        <div class="col-md-auto">
            @if($store->avatar)
            <img src="{{ Storage::url($store->avatar)}}" alt="" class="card-image-profile">
            @else
            <img src="https://via.placeholder.com/150" alt="" class="card-image-profile">
            @endif
           
        </div>
        <div class="col">
            <div class="card-description-profile">
             
                
                <h3>{{$store->name}}</h3>
                <div id="card-reputation">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p><span><i class="fas fa-map-marker-alt"></i></span>{{$store->address}}</p>
                <p><span><i class="fas fa-clock"></i></span>{{$store->horarios}}</p>
                <h6>Descripcion</h6>
                <p>{{$store->description}}</p>
            </div>
        </div>
    </div>
    @if(Auth::user())
    @if( Auth::user()->rol == 'client')
        @if($otp != '' && $otp->is_used == 0)
        <div class="alert alert-info">
            <p>Tienes un codigo generado pendiente: {{ $otp->otp_pass}}   <a class="btn-alternative" href="{{ route('otp.cancel', ['idOtp'=>$otp->id]) }}">Cancelar pedido</a>   </p>
        </div>
        @endif
    @endif
   @endif
    @if(Session::has('info'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            {{ Session::get('info') }}
        </div>
    @endif
    
    <hr class="solid">
    <div class="row">
        <?php
        // SDK de Mercado Pago
        require '../vendor/autoload.php';
        // Agrega credenciales
          \MercadoPago\SDK::setAccessToken($credentials->access_token);   
      /* \MercadoPago\SDK::setAccessToken('TEST-5841017781823689-050723-4081492e6e230f3f7078e56332de7955-318863690');*/
     
        ?>
        @if($store)
        @foreach ($store->offers as $offer)
        <?php 
        $preference = new MercadoPago\Preference();
        
        $item = new MercadoPago\Item();
        $item->id =$offer->id; 
        $item->title = $offer->name_offer ;
        $item->description =$offer->description_offer ;
        $item->quantity = 1;
        $item->unit_price = $offer->cost;
        $item->category_id =$offer->id;

        $preference->items = array($item);
    
        $preference->save(); 


        ?>
       {{--  @if(Auth::user()->rol == 'client')
            @if()
        @endif --}}
     

        <div class="col-xs-12 col-md-6 col-xl-4">
            <div class="card-product">
                <div class="row">
                    <div class="col-6">
                        @if($offer->image_offer)
                        <img src="{{ Storage::url($offer->image_offer)}}" alt="" class="card-image-product ">
                        @else
                        <img src="https://via.placeholder.com/150" alt="" class="card-image-product ">
                        @endif
                    </div>
                    <div class="col-6">
                        <div class=" card-index-product" >
                            <div>
                                <p>Total vendidos</p>
                                <p><b>{{$offer->total_amount}}</b></p>
                                <hr class="solid">
                                <p>Disponibles </p>
                                <p><b>{{$offer->amount}}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-description-product">
                    <h4>{{ $offer->name_offer }}</h4>
                    <p>{{ $offer->description_offer }}</p>
                    <h3>$ {{ $offer->cost }}</h3>
                    
                </div>
                <div class="card-btn-product ">
                 <form action="{{ route('verificar.pago')}}" method="POST"> 
                    <input type="hidden" name="ofert" value="{{$credentials->access_token}}"> {{-- cambiar esto tambien --}}
                    @csrf
                        
                        <script 
                        data-button-label="Comprar"
                        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                        data-preference-id="<?php echo $preference->id;?>">
                      
                        </script>
                     
                  </form> 
                    @if (!Auth::guest())
                        @if (Auth::user()->rol == 'client' && $offer->amount > 0)
                            <a class="btn-alternative btn-block" href="{{ route('otps.create', ['idstore' => $store->id, 'idclient' => Auth::user()->id,'idOffer'=>$offer->id]) }}">Retirar</a>   
                        @endif
                    @endif
                  
                </div>
            </div>
        </div>
       
        @endforeach
         @endif
</div>
<!-- Fin contenedor -->



@endsection