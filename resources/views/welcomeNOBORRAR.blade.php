@include('layouts.app')
@yield('content')

<?php
// SDK de Mercado Pago
require '../vendor/autoload.php';

    \MercadoPago\SDK::setAccessToken("TEST-4473036575801903-042214-90e96cb43dab864cda0953e27f5c8539-553262681");
    

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <title>Te lo regalo</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
                background-color: #f0f8fe;
            }
            .full-height2 {
                height: 100vh;
              
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content:center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 400%;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .input-search{
                width:180px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
     
        <div class="flex-center position-ref full-height">
     
  {{--           @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
            

                <div class="container p-0">
                    <div class="row title">
                        <div class="col p-0 ml-2">

                            Te lo regalo
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                           <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                Nullam vel nibh a turpis ornare rutrum. Aenean nec augue felis. 
                                Donec lorem nisl, lacinia nec feugiat ac, interdum nec quam. Fusce euismod 
                                pellentesque neque ut mattis. Phasellus dignissim dolor ut mi congue, ac accumsan 
                                sapien condimentum. Phasellus ultricies, ipsum quis suscipit viverra, nulla turpis maximus leo,                              
                           </p>
                        </div>
                    </div>

                    <div class="row m-1 justify-content-start hidden-lg">
                        @guest
                        <div  class="m-0">
                            <a class="btn btn-primary m-0" href="stores/register" role="button">Registrar comercio</a> 
                        </div>  
                        @endguest 
                        <div class=" mx-1">
                        <form action="/" method="POST">
                            <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id; ?>">
                            </script>
                            </form>
                        </div> 
                    </div>
                
            
                </div>
            </div>

                <div class="full-height2">
                    <div class="row justify-content-center p-5"> 
                        <h2 >COMERCIOS QUE YA FORMAN PARTE</h2>
                    </div>

                    <div class="container ">
                       
                    <div class="row justify-content-center">
                        <input class="form-control col-lg-6 col-md-6 col-sm-6 col-xs-12 align-self-center" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary col-lg-2 col-md-2 d-sm-none d-md-block d-none d-sm-block" type="submit">Search</button>
                    </div>
                        
                    @foreach($stores as $store)
                    
                    <div class="card m-1" style="width: 18rem;">
                        <img class="card-img-top w-80" src="https://static3.bigstockphoto.com/7/9/2/large2/297455965.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Nombre: {{ $store->name}}</h5>
                          <h6 class="card-title">Categoria: {{ $store->category}}</h6>
                          <p class="card-text">Descripcion :{{ $store->description}}</p>
                          <p class="card-text">Ubicacion :{{ $store->address}}</p>
                            <a class="btn btn-primary" href=" {{ route('stores.show', $store->id) }}">Ver productos</a>
                        </div>
                      </div>
                      
                
                    @endforeach

                    


                    </div>
                </div>
               
    </body>   

</html>
