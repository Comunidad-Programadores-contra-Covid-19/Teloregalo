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
        <div class="card-report">
            @if($success)
                <p class="text-center">El comercio {{$store->name}} ha sido reportado correctamente.<br><b>¡Muchas gracias!</b></p>
            @else
                <p class="text-center">Ha ocurrido un problema al reporta el comercio {{$store->name}}.<br>Por favor, comunicate con el equipo de Te Lo Regalo informando el problema.<br><b>¡Muchas gracias!</b></p>
            @endif
        </div>
    </div>

    
<!-- Fin contenedor -->
</div>



@endsection
