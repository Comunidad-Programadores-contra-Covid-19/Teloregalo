@extends('layouts.app')


@section('content')
<!-- Inicio contenedor -->
<div class="container">
    <!-- Inicio Bot車n "volver" -->
    {{-- <div class="volver">
        <a href="{{ url()->previous() }}"><  Volver</a>
    </div> --}}
        <!-- Fin Bot車n "volver" -->


{{-- 
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
    @endif --}}

    <div class="row">
        @if($success)
            <p>El comercio {{$store->name}} ah sido reportado correctamente. Muchas gracias</p>
        @else
            <p>Hubo un problema reportando al comercio {{$store->name}}. Por favor, comunicate con nosotros al respecto. Muchas gracias</p>
        @endif
    </div>

    
<!-- Fin contenedor -->
</div>



@endsection
