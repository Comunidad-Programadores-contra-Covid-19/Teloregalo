@extends('layouts.app')

@section('content')

    <div class="container">

        <section id="contenedorDonar">

            <img src="{{asset('assets/ayudar.svg')}}" alt="logo" id="imgAyuda">

            <h1 id="tituloDonar">Ayudanos a ayudar</h1>

            <h5 id="subtituloDonar">
                <p>Somos un grupo de voluntarios que nos unimos para colaborar durante la pandemia</p>
                <p>Necesitamos de tu colaboración para que teloregalo.com se mantenga en línea ayudando a comerciantes y héroes.</p>
            </h5>

            <div id="donaciones">
                <div id="donar">
                     <p id="valorDonacion">$100</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 día</p>
                    <p>en costos de mantenimiento</p>
                
                    <div>
                        <a id="btnColaborar" mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=565635578-8a5d277a-a631-4e53-bfb3-e14de2bfc4be" name="MP-payButton" class='btn btn-principal'>Colaborar</a>
                        <script type="text/javascript">
                        (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                        </script>
                        </div>
                    </div>

                <div id="donar">
                    <p id="valorDonacion">$500</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 semana</p>
                    <p>en costos de mantenimiento</p>

                    <a id="btnColaborar" mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=565635578-45556645-b5c8-4c13-809a-0401d5dc0c31" name="MP-payButton" class='btn btn-principal'>Colaborar</a>
                    <script type="text/javascript">
                    (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                    </script>
                    
                  
                </div>

                <div id="donar">
                    <p id="valorDonacion">$2.000</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 mes</p>
                    <p>en costos de mantenimiento</p>
                    <a  id="btnColaborar" mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=565635578-9432e152-92bd-415c-8706-5d18d4acbcee" name="MP-payButton" class='btn btn-principal'>Colaborar</a>
                    <script type="text/javascript">
                    (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                    </script>
                    
                </div>

                <div id="donar">
                    <p id="valorDonacion">$12.000</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">6 meses</p>
                    <p>en costos de mantenimiento</p>
                    <a  id="btnColaborar"  mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=565635578-f943ac26-1b8f-4fdd-bc92-9dafac9e73b4" name="MP-payButton"  class='btn btn-principal'>Colaborar</a>
                    <script type="text/javascript">
                    (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                    </script>

                </div>

                <div id="donar">
                    <p id="valorDonacion">$24.000</p>
                    <p>equivalente a</p>
                    <p id="tiempoDonacion">1 año</p>
                    <p>en costos de mantenimiento</p>
                    <a id="btnColaborar" mp-mode="dftl" href="https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=565635578-d3ec3702-48cc-4301-843c-dce804ec0092" name="MP-payButton" class='btn btn-principal'>Colaborar</a>
                    <script type="text/javascript">
                    (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
                    </script>

                   
                </div>
            </div>

            <img  src="{{asset('assets/foto%20equipo.svg')}}" alt= "donar" id="imgDonar">

            <h2 id="graciasDonar">¡<b>Muchas gracias</b> por ser parte!</h2>


        </section>

    </div>
    <!-- Fin contenedor -->
@endsection
