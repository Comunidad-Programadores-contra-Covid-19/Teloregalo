@extends('layouts.app')
<?php   /* $user=Auth::user()->client */  ?>

@section('content')
<body>
    {{-- <div class="container">
        <div class="row">
            <h1>Gracias por cuidarnos!</h1>
            <p>Para poder retirar {regalo} presenta el siguiente codigo en el comercio</p>
        </div>
        <hr>
        <div class="row">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Codigo</div>
                <div class="card-body">
                    <h5 class="card-title"> {{ $otp->otp_pass}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
    </div> --}}
    <!-- Inicio contenedor -->
    <div class="container">
      
        <!-- Inicio Botón "volver" -->
        <div class="volver">
            <button><  Volver</button>
        </div>
        <!-- Fin Botón "volver" -->

        <!-- Inicio Información del ticket regalo -->
        <div id="codigoRegalo">
            <h1>¡Gracias por cuidarnos!</h1>
            <p>Para poder retirar <span id="ingresarRegalo">{regalo}</span> presentá el siguiente código en el comercio</p>
            <div id="ticket">
                <p>{{$otp->otp_pass}}</p>
                <img src={{ asset('assets/ticketConfirmacion.svg') }}>
                
            </div>
        </div>
        <!-- Fin Información del ticket regalo -->

        <!-- Inicio Calificar comercio -->
        <div>
            <img src="{{ asset('assets/like.svg')}}" alt="like" id="dibujoLike">  
            <div id="calificar">
                <h2>Calificá tu experiencia</h2>
            
            <ul>
                <form action="{{ route('puntuacion') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="Puntuar" class="btn btn-primary">
                </form>
                <li><button id="estrella1" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button></li>
                <li><button id="estrella2" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button></li>
                <li><button id="estrella3" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button></li>
                <li><button id="estrella4" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button></li>
                <li><button id="estrella5" onclick="getRating(this.id)"><img src="{{ asset('assets/estrella.svg')}}" alt=""></button></li>
            </ul>
               
                <h3>Nombre de comercio</h3>
                <p><img src="{{asset('assets/gota.svg')}}" alt="ubicacion">Av. Defensa 700, Buenos Aires</p>
            </div>
        </div> 
        <!-- Fin Calificar comercio -->
    </div>
    <!-- Fin contenedor -->
    <script>
        function getRating(rating){
            rating = parseInt(rating[8],10);
            console.log(rating);
            const token = document.querySelector('meta[name="csrf-token"]').content;
            url = '/stores/setPuntuacion';

            fetch(url,{
                method: 'PUT',
                credentials: 'omit',
                mode: 'same-origin',
                headers:{
                    "Content-Type": "application/json; charset=utf-8",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify({puntuacion: rating, cant: 1})
            });
        }
    </script>
</body>
@endsection