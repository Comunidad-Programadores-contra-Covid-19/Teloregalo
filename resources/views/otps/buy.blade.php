@extends('layouts.app')
<?php   /* $user=Auth::user()->client */  ?>

@section('content')
<body>
    <!-- Inicio contenedor -->
    <div class="container">

        <!-- Inicio Botón "volver" -->
        <div class="volver">
            <a href="{{ redirect()->getUrlGenerator()->previous() }}"><  Volver</a>
        </div>
        <!-- Fin Botón "volver" -->

        <!-- Inicio Información del ticket regalo -->
        <div id="codigoRegalo">
            <h1>¡Gracias por cuidarnos!</h1>

            <p>Para poder retirar <span id="ingresarRegalo">{{ $offer }}</span> presentá el siguiente código en el comercio</p>

            <div id="ticket">
                <p>{{$otp->otp_pass}}</p>
                <img src={{ asset('assets/ticketConfirmacion.svg') }}>

            </div>
        </div>
        <!-- Fin Información del ticket regalo -->
    </div>
    <!-- Fin contenedor -->
</body>
@endsection
