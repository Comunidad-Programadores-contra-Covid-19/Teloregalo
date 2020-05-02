@extends('layouts.app')


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
                  <p class="card-text">$ {{ $offer->cost }}</p>

                  <a href="{{ route('offers.show', $offer->id) }}" class="btn-principal">Regalar</a>

                  <a href="{{ route('otps.create') }}" class="btn btn-primary">Retirar</a>
                </div>
              </div>
            @endforeach  
        </div>
    </div>
    
</body>
@endsection