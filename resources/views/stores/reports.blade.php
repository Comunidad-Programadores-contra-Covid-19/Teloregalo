@extends('layouts.app')


@section('content')
<!-- Inicio contenedor -->
<div class="container">

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
