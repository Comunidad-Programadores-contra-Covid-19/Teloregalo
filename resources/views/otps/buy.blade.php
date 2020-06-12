@extends('layouts.app')
<?php   /* $user=Auth::user()->client */  ?>

@section('content')
<body>
    <!-- Inicio contenedor -->
    <div class="container">

        <!-- Inicio Botón "volver" -->
        <div class="volver">
            <button href="{{ redirect()->getUrlGenerator()->previous() }}"><  Volver</button>
        </div>
        <!-- Fin Botón "volver" -->

        <!-- Inicio Información del ticket regalo -->
        <div id="codigoRegalo">
            <h1>¡Gracias por cuidarnos!</h1>
            @foreach ($offer as $o)
            <p>Para poder retirar <span id="ingresarRegalo">{{ $o->name_offer }}</span> presentá el siguiente código en el comercio</p>
            @endforeach
            <div id="ticket">
                <p>{{$otp->otp_pass}}</p>
                <img src={{ asset('assets/ticketConfirmacion.svg') }}>

            </div>
        </div>
        <!-- Fin Información del ticket regalo -->

        <!-- Inicio Calificar comercio -->
       {{--   <div>
            <img src="{{ asset('assets/like.svg')}}" alt="like" id="dibujoLike">
            <div id="calificar">
                <h2>Calificá tu experiencia</h2>

            <ul class="row justify-content-center">
                <li><form action="{{ route('puntuacion', 1) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" id="estrella1" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button>
                </form></li>
                <li><form action="{{ route('puntuacion', 2) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" id="estrella1" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button>
                </form></li>
                <li><form action="{{ route('puntuacion', 3) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" id="estrella1" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button>
                </form></li>
                <li><form action="{{ route('puntuacion', 4) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" id="estrella1" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button>
                </form></li>
                <li><form action="{{ route('puntuacion', 5) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" id="estrella1" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button>
                </form></li>
            </ul>

            @foreach ($store as $s)

            <h3>{{ $s->name }}</h3>
                <p><img src="{{asset('assets/gota.svg')}}" alt="ubicacion">{{ $s->address }}</p>

         @endforeach
            </div>
        </div>  --}}
        <!-- Fin Calificar comercio -->
    </div>
    <!-- Fin contenedor -->
</body>
@endsection
