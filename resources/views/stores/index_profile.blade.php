@extends('layouts.app')


@section('content')

<!-- Inicio contenedor -->
<div class="container">
    <!-- Inicio Botón "volver" -->
    <div class="volver">
        <a href="{{ url()->previous() }}"><  Volver</a>
    </div>
        <!-- Fin Botón "volver" -->
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
        @foreach ($store->offers as $offer)
        <div class="col-xs-12 col-md-6 col-xl-4">
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
                    <a href="#" class="btn-principal btn-block ">Comprar</a>
                    @if (!Auth::guest())
                        @if (Auth::user()->rol == 'client')
                            <a class="btn-alternative btn-block" href="{{ route('otps.create', ['idstore' => $store->id, 'idclient' => Auth::user()->id]) }}">Retirar</a>   
                        @endif
                    @endif
                  
                </div>
            </div>
        </div>
        @endforeach
</div>
<!-- Fin contenedor -->



@endsection