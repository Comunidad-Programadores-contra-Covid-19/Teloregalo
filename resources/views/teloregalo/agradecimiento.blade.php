@extends('layouts.app')
@section('content')

<div class="container">

    <!-- Inicio Botón "volver" -->
    <div class="volver">
        <button><  Volver</button>
    </div>
    <!-- Fin Botón "volver" -->

    <!-- Inicio Compartir -->
    <section id="compartirAgradecimiento">

        <h1 id="tituloGracias">¡Hoy te convertiste en Héroe!</h1>

        <h4 id="subtituloGracias">Compartí esta buena acción para que otros te imiten</h4>

        <img src="Regursos%20graficos/gracias.svg" alt="gracias" id="imgGracias">

        <ul id="iconosCompartir">
            <li><button id="compartirDescargar"><img src="Regursos%20graficos/descarga.svg" alt="icono descargar"></button></li>
            <li><button id="compartirWhatsapp"><img src="Regursos%20graficos/whatsapp.svg" alt="icono whatsapp"></button></li>
            <li><button id="compartirInstagram"><img src="Regursos%20graficos/instagram.svg" alt="icono instagram"></button></li>
            <li><button id="compartirFacebook"><img src="Regursos%20graficos/facebook.svg" alt="icono facebook"></button></li>
            <li><button id="compartirTwitter"><img src="Regursos%20graficos/twitter.svg" alt="icono twitter"></button></li>
            <li><button id="compartirCorreo"><img src="Regursos%20graficos/correo.svg" alt="icono correo"></button></li>
        </ul>
    </section>
    <!-- Fin Compartir -->

    <!-- Inicio Pedir email -->
    <section id="pedirEmail">
        <h5>Si querés saber cuando es entregado tu regalo dejanos tu nombre y email.</h5>
        <form id="formAgradecimiento">
            <div class="form-group ">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="">
            </div>
            <button type="submit" class="btn btn-principal btn-block" id="btnConfirmar">Confirmar</button>
        </form>
    </section>
    <!-- Fin Pedir email -->

</div>
<!-- Fin contenedor -->
@endsection