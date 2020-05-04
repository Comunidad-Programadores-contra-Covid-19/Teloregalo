@extends('layouts.app')
<?php  ?>

@section('content')
<body>
    <div class="container">
        <div class="row">
            <img src=https://1000marcas.net/wp-content/uploads/2019/12/Fila-Logo-600x338.png class="mx-left m-4 d-block col-2" >
            <h1>{{ $store->name }}</h1>
        </div>
        <hr>
        @if(Session::has('info'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            {{ Session::get('info') }}
        </div>
      @endif
      </div>
        <div class="row">
              @foreach ($store->offers as $offer)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://www.pngkit.com/png/full/47-477296_clip-freeuse-library-grocery-products-svg-png-icon.png" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{ $offer->name_offer }}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Comprar</a>

                  @if (!Auth::guest())
                      @if (Auth::user()->rol == 'client')
                        <a class="btn btn-primary" href="{{ route('otps.create', ['idstore' => $store->id, 'idclient' => Auth::user()->id]) }}">Retirar</a>   
                      @endif
                  @endif

                </div>
              </div>
            @endforeach  
        </div>
    </div>
    
</body>
@endsection