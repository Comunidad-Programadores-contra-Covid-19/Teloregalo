@extends('layouts.app')

@section('content')
    <div class="container">

        <section id="contenedorDonar">
        
            <img src="assets/ayudar.svg" alt="logo" id="imgAyuda">
            
            <h1 id="tituloDonar">Ayudanos a ayudar</h1>

            <img src="assets/foto%20equipo.svg" alt="donar" id="imgDonar">
            
            <h5 id="subtituloDonar">
                <p>Somos un grupo de voluntarios que nos unimos para colaborar durante la pandemia. Creamos proyectos de ayuda para que la sociedad se pueda expresar y agradecer a través de medios digitales.</p>
            </h5>
            
            <div id="donaciones">
                <div id="donarTeloregalo">
                    <div id="bordeLogo1"><img src="assets/logo%20regalo.svg" alt="logo TeLoRegalo"></div>
                    <p>Colaborá con nuestra comunidad para mantener en pie los canales de ayuda y agradecimiento</p>
                    <button id="btnDonarTeloregalo" class="btn-principal" style="font-weight: bold">Donar</button>
                </div>
                
                <div id="otrasDonaciones">
                    <h5>Para continuar ayudando a quienes más lo necesitan visitá las siguientes organizaciones:</h5>
                    <div id="donarBcoAlimentos">
                        <div id="bordeLogo2">
                            <img src="assets/logo%20banco%20de%20alimentos.svg" alt="logo Banco de Alimentos">
                        </div>
                        <p>Banco de alimentos</p>
                        <button id="btnDonarBcoAlimentos" class="btn-principal" style="font-weight: bold">Conocer más</button>
                    </div>
                    
                    <div id="donarCruzRoja">
                        <div id="bordeLogo2">
                            <img src="assets/logo%20cruz%20roja.svg" alt="logo Cruz Roja">
                        </div>
                        <p>Cruz Roja</p>
                        <button id="btnDonarCruzRoja" class="btn-principal" style="font-weight: bold">Conocer más</button>
                    </div>
                </div>
            </div>
            
        </section>      

    </div>
    <!-- Fin contenedor -->

    
    <!-- Inicio Footer -->
    <footer style="margin-top: 1.5em;">
        <div id="contenedorFooter">
            <div class="row">
                <div class="col-lg-2" id="logoFooter">
                    <a href="#" >
                        teloregalo
                        <img src="assets/logo.svg" width="35" height="35" alt="">
                    </a>
                </div>
                
                <div class="col-lg-7" id="menuFooter">
                    <ul>
                        <li>
                        <a href="#">Comercios adheridos</a>
                        </li>
                        <li>
                        <a href="#">Preguntas frecuentes</a>
                        </li>
                        <li>
                            <a href="#">Quiénes somos</a>
                            </li>
                        <li>
                            <a href="#">Donar</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3" id="año">
                    <p>2020 Te lo regalo</p>
                </div>
            </div>
        </div>
    </footer>
 

@endsection