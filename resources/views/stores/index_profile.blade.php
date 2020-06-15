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
                    @if ($store->rating != 0)
                     @for ($i = 1; $i <= $store->rating; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor

                    @for ($i = 1; $i < 6-$store->rating; $i++)
                    <span class="fa fa-star"></span>
                     @endfor
                   @else
                  @for ($i = 1; $i <= 5; $i++)
                            <span class="fa fa-star"></span>
                  @endfor
                  @endif
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
            <p>Tienes un codigo generado pendiente: {{ $otp->otp_pass}} <a class="btn-alternative" href="{{ route('otp.cancel', ['idOtp'=>$otp->id]) }}">Cancelar pedido</a></p>
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
        /*  \MercadoPago\SDK::setAccessToken($credentials->access_token);   */
       \MercadoPago\SDK::setAccessToken('TEST-5841017781823689-050723-4081492e6e230f3f7078e56332de7955-318863690');

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

                <div class="card-description-product-name">
                    <h4>{{ $offer->name_offer }}</h4>
                </div>

                <div class="row">
                    <div class="col-12">
                        @if($offer->image_offer)
                        <img src="{{ Storage::url($offer->image_offer)}}" alt="" class="card-image-product ">
                        @else
                        <img src="https://via.placeholder.com/150" alt="" class="card-image-product ">
                        @endif
                    </div>
                </div>
                <div>
                    <div class="card-index-product row">
                        <label class="col-lg-6">Total regalados: <b>{{$offer->total_amount}}</b></label>
                        <label class="col-lg-6">Disponibles para retirar: <b>{{$offer->amount - $offer->active_otps}}</b></label>
                    </div>
                </div>
                <div class="card-description-product">
                    <h4>{{ $offer->name_offer }}</h4>
                    <p>{{ $offer->description_offer }}</p>
                    <h3>$ {{ $offer->cost }}</h3>
                </div>
                <div class="card-btn-product ">
                    <div class="row">
                        <div class="col-lg-6"> 
                            @if ($offer->amount - $offer->active_otps > 0 && (Auth::guest() || Auth::user()->rol != 'store'))
                                @if (!Auth::guest() && Auth::user()->rol == 'client')
                                    <a class="btn-alternative btn-block" href="{{ route('otps.create', ['idstore' => $store->id, 'idclient' => Auth::user()->id,'idOffer'=>$offer->id]) }}">Retirar</a>
                                @else
                                    <a class="btn-alternative btn-block" href="{{ route('login') }}">Retirar</a>
                                @endif
                            @endif
                        </div>

                        <div class="col-lg-6"> 
                            <form action="{{ route('verificar.pago')}}" method="POST">
                                <input type="hidden" name="ofert" value="TEST-5841017781823689-050723-4081492e6e230f3f7078e56332de7955-318863690"> {{-- cambiar esto tambien --}}
                                @csrf

                                <script
                                    data-button-label="Regalar"
                                    src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                                    data-preference-id="<?php echo $preference->id;?>">

                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
         @endif
</div>
<!-- Fin contenedor -->



@endsection
