@extends('layouts.app')
<?php
// SDK de Mercado Pago
require '../vendor/autoload.php';

    \MercadoPago\SDK::setAccessToken("TEST-4473036575801903-042214-90e96cb43dab864cda0953e27f5c8539-553262681");
    

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();


// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = $offer->name_offer;
$item->quantity = 1;
$item->unit_price = $offer->cost;
$preference->items = array($item);
$preference->save();

?>

@section('content')

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<body>
    <div class="container">
        <div class="row">
            <img src=https://1000marcas.net/wp-content/uploads/2019/12/Fila-Logo-600x338.png class="mx-left m-4 d-block col-2" >
            <h1>{{ $offer->name }}</h1>
        </div>
        <hr>
        <div class="row">
        
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://www.pngkit.com/png/full/47-477296_clip-freeuse-library-grocery-products-svg-png-icon.png" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{ $offer->name_offer }}</h5>
                  <p class="card-text">{{ $offer->description_offer }}</p>
                  <p class="card-text">$ {{ $offer->cost }}</p>
                  
                  <form action="/procesar-pago" method="POST">
                            <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id; ?>" data-button-label="Pagar">
                            </script>
                            </form>
                </div>
              </div>
        </div>
    </div>
    
</body>
@endsection