@extends('layouts.app')

@section('content')
    <!-- Inicio contenedor -->
    <div class="container">
        <!-- Inicio cabecera presentación -->
        <section id="contenedorPresentacion">
            <div class="container features" id="imgPresentacion">
                <img src= "{{asset('asset/lupa.svg')}}" class="Lupa" alt="icono lupa">
            </div>
            <p id="titulo">Error 404</p>
            <p id="parrafo">Página no encontrada</p>
            <div class="col-7">
                <a href="{{route('welcome')}}" class=" btn-principal " id="btnInicio">Volver al inicio</a>
            </div>

            <div class="imagenError">
                <img src= "{{asset('asset/error404.svg')}}" alt="Error" >
            </div>
        </section>
    </div>
    <!-- Fin contenedor -->
@endsection
