@extends('layouts.app')

@section('content')
    <div class="container">

        <section id="contenedorDonar">

            <img src="{{asset('assets/ayudar.svg')}}" alt="logo" id="imgAyuda">

            <h1 id="tituloDonar">Ayudanos a ayudar</h1>

            <h5 id="subtituloDonar">
                <p>Somos un grupo de voluntarios que nos unimos para colaborar durante la pandemia.</p>
                <p>Necesitamos de tu colaboración para que teloregalo.com se mantenga en línea ayudando a comerciantes y héroes.</p>
            </h5>

            <div id="donaciones">
                <div id="donar">
                    <p id="valorDonacion">$100</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 día</p>
                    <p>en costos de mantenimiento</p>
                    <button id="btnColaborar" class="btn-principal">Colaborar</button>
                </div>

                <div id="donar">
                    <p id="valorDonacion">$500</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 semana</p>
                    <p>en costos de mantenimiento</p>
                    <button id="btnColaborar" class="btn-principal">Colaborar</button>
                </div>

                <div id="donar">
                    <p id="valorDonacion">$2.000</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 mes</p>
                    <p>en costos de mantenimiento</p>
                    <button id="btnColaborar" class="btn-principal">Colaborar</button>
                </div>

                <div id="donar">
                    <p id="valorDonacion">$12.000</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">6 meses</p>
                    <p>en costos de mantenimiento</p>
                    <button id="btnColaborar" class="btn-principal">Colaborar</button>
                </div>

                <div id="donar">
                    <p id="valorDonacion">$24.000</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 año</p>
                    <p>en costos de mantenimiento</p>
                    <button id="btnColaborar" class="btn-principal">Colaborar</button>
                </div>
            </div>

            <img  src="{{asset('asset/foto%20equipo.svg')}}" alt= "donar" id="imgDonar">

            <h2 id="graciasDonar">¡<b>Muchas gracias</b> por ser parte!</h2>


        </section>

    </div>
    <!-- Fin contenedor -->
@endsection
