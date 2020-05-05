@extends('layouts.app')


@section('content')

<!-- Inicio contenedor -->
<div class="container">
    <!-- Inicio Botón "volver" -->
    <div class="volver">
    <a href="{{ url()->previous() }}"><  Volver</button>
    </div>
    <!-- Fin Botón "volver" -->
        <div class="row ">
            <div class="col-md-auto">
                <img src="https://via.placeholder.com/150" alt="" class="card-image-profile">
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
                    <p><span><i class="fas fa-map-marker-alt"></i></span>Martín Miguel de Güemes 2701, B7600 Mar del Plata, Buenos Aires</p>
                    <p><span><i class="fas fa-clock"></i></span>Lun a Sáb de 10:00 a 21:00</p>
                    <h6>Descripcion</h6>
                    <p>{{$store->description}}</p>
                </div>
            </div>
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
                <div class="card-btn-product ">
                    <a href="{{ route('offers.show', $offer->id) }}" class="btn-principal btn-block ">Comprar</a>
                    <a href="{{ route('otps.create') }}" class="btn-alternative btn-block ">Retirar</a>
                </div>
            </div>
            @endforeach
        </div>
       
    </div>
</div>
<!-- Fin contenedor -->

<!-- Inicio Footer -->
<footer style="margin-top: 1.5em;">
    <div id="contenedorFooter">
        <div class="row">
            <div class="col-lg-2" id="logoFooter">
                <a href="#" >
                    teloregalo
                    <img src="Regursos%20graficos/logo.svg" width="35" height="35" alt="">
                </a>
            </div>

            <div class="col-lg-7" id="menuFooter">
                <ul>
                    <li>
                        <a href="#">Comercios adheridos</a>
                    </li>
                    <li>
                        <a href="#">Preguntas frecuentes</a>
                    </li>
                    <li>
                        <a href="#">Quiénes somos</a>
                    </li>
                    <li>
                        <a href="#">Donar</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3" id="año">
                <p>2020 Te lo regalo</p>
            </div>
        </div>
    </div>
</footer>
<!-- Fin Footer -->


@endsection