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

    <hr class="solid">
    <div class="row">

 
        <div class="col-xs-12 col-md-6 col-xl-4">
          @foreach ($store->offers as $offer)
            <div class="card-product">
                <div class="row">
                    <div class="col-6">
                        <img src="https://via.placeholder.com/150" alt="" class="card-image-product ">
                    </div>
                    <div class="col-6">
                        <div class=" card-index-product" >
                            <div>
                                <p>Total vendidos</p>
                                <p><b>70</b></p>
                                <hr class="solid">
                                <p>Disponibles </p>
                                <p><b>70</b></p>
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