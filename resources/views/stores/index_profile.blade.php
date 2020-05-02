@extends('layouts.app')
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

@section('content')
<body>
    <div class="container">
        <div class="row">
            <img src=https://1000marcas.net/wp-content/uploads/2019/12/Fila-Logo-600x338.png class="mx-left m-4 d-block col-2" >
            <h1>{{ $store->name }}</h1>
        </div>
        <hr>
        <div class="row">
            
              @foreach ($store->offers as $offer)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://www.pngkit.com/png/full/47-477296_clip-freeuse-library-grocery-products-svg-png-icon.png" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{ $offer->name_offer }}</h5>
                  <p class="card-text">{{ $offer->description_offer }}</p>
                  <p class="card-text">{{ $offer->cost }}</p>
                  
                  <form action="/" method="POST">
                            <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="<?php echo $preference->id; ?>">
                            </script>
                            </form>

                  <a href="{{ route('otps.create') }}" class="btn btn-primary">Retirar</a>
                </div>
              </div>
            @endforeach  
        </div>
    </div>
    
</body>
@endsection