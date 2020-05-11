@extends('layouts.app')
@section('content')

<!-- Inicio contenedor -->
<div class="container">

    <section id="content">

        <img src="{{asset('assets/quienesSomos.svg')}}" alt="">

        <h1>Quiénes somos</h1>

        <p class="text-center">Somos una comunidad de voluntarios del ámbito del diseño y desarrollo, dispuestos a crear herramientas digitales para ayudar a la sociedad en tiempos difíciles.
        </p>

    </section>

    <h3 class="subtitulosQuienesSomos">Nuestros Proyectos</h3>
    <div class="row" id="ntrosProyectos">
        <div class="col-md-12 col-lg-6 mb-3">
            <a href= "https://graciasporcuidarnos.com.ar"><h2>#graciasporcuidarnos  <img src="{{asset('assets/clap1.png')}}" width="40" height="40" class="d-inline-block align-bottom" alt=""></h2></a>
            <p>Acompañá los aplausos a los heroes escribiendo un mensaje de agradecimiento.</p>
        </div>
        <div class="col-md-12 col-lg-6 mb-3">
            <h2>teloregalo <img src="{{asset('assets/logo.svg')}}" width="40" height="40" class="d-inline-block align-bottom" alt=""></h2>
            <p>Comprá a través de la aplicación a un comercio de confianza. Lo que compres, lo podrá retirar cualquier persona que se encuentre trabajando durante la pandemia.</p>
        </div>
    </div>

    <h3 class="subtitulosQuienesSomos">¡Conocé al equipo!</h3>
    <section id="miembrosEquipo" class="box-line pl-3 pr-3">

        <h3>Fundador</h3>
        <div class="row" id="equipo">
            <div class="col-md-12 col-lg-12">
                <div class="card-member">
                    <img src="{{asset('assets/Esteban.jpg')}}" alt="" class="avatar">
                    <h6>Esteban Atlasovich</h6>
                    <a href="https://www.linkedin.com/in/esteban-atlasovich-49045890/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/esteban-atlasovich</a>
                    <p><em>"A Ananda. Por cuidar a mi Abuela y a todos los Agentin@s."</em></p>
                </div>
            </div>
        </div>

        <h3>Proyect Leaders</h3>
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/Fernando%20Zamora.jpg')}}" alt="" class="avatar">
                    <h6>Fernando Zamora</h6>
                    <a href="https://www.linkedin.com/in/fernando-zamora-/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/fernando-zamora-</a>
                    <p><em>"Agradezco a quienes buscan ser parte de la solución y mitigar el impacto de esta crisis."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="https://via.placeholder.com/50" alt="" class="avatar">
                    <h6>Sergio A. Torchia</h6>
                    <a href="https://www.linkedin.com/in/sergio-a-torchia-06239b18/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/sergio-a-torchia-06239b18/</a>
                    <p><em>"A Luis Pombo, Mariano Teyssandier y todos los que ponen el cuerpo para que estemos todos los días un poquito mejor."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/facundo%20luzko.png')}}" alt="" class="avatar">
                    <h6>Facundo Luzko</h6>
                    <a href="https://www.linkedin.com/in/facundo-luzko/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/facundo-luzko/</a>
                    <p><em>"A médicos, investigadores y a todos los que desde su lugar aportan su granito de arena a la situación."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/Julian.jpg')}}" alt="" class="avatar">
                    <h6>Julian Atlasovich</h6>
                    <a href="https://www.linkedin.com/in/julian-atlasovich/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/julian-atlasovich/</a>
                    <p><em>"Gracias Ananda por salvar a la abuela."</em></p>
                </div>
            </div>
        </div>

        <h3>Diseñadorxs UX</h3>
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/Anto%20Montero.jpg')}}" alt="" class="avatar">
                    <h6>Anto Montero</h6>
                    <a href="https://www.linkedin.com/in/anmontero/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/anmontero/</a>
                    <p><em>"A todos los que están al frente, pero en especial a los profes y maestros, héroes silenciosos. A mi hermana Andrea, ¡te quiero!"</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/mariana-ruiz.png')}}" alt="" class="avatar">
                    <h6>Mariana Ruiz</h6>
                    <a href="https://www.linkedin.com/in/marirumo/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/marirumo/</a>
                    <p><em>"Gracias a todas las personas que han seguido trabajando para que los demás podamos quedarnos en casa."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/Valeria%20Tenaglia.jpg')}}" alt="" class="avatar">
                    <h6>Valeria Tenaglia</h6>
                    <a href="https://www.linkedin.com/in/valu-tenaglia/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/valu-tenaglia/</a>
                    <p><em>"Gracias al personal de laboratorio del Htal.Italiano y CDR y a todos los que desde su lugar continúan ayudando."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/Rocio%20Oestereicher.jpg')}}" alt="" class="avatar">
                    <h6>Rocio Oestereicher</h6>
                    <a href="https://www.linkedin.com/in/annieoestereicher-6864a7172/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/annieoestereicher-6864a7172/</a>
                    <p><em>"A las enfermeras de mi vida. Al Hospital Tornú y todo su equipo de personas. A mi abuela, un beso al cielo."</em></p>
                </div>
            </div>
        </div>

        <h3>Front End</h3>
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card-member">
                    <img src="{{asset('assets/Juan%20Pablo%20Larraza.jpg')}}" alt="" class="avatar">
                    <h6>Juan Pabo Larraza</h6>
                    <a href="https://www.linkedin.com/in/juanpablolarraza/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/juanpablolarraza/</a>
                    <p><em>"A todos los que salen día a día para combatir esta situación, no me alcanzan las palabras para nombrar a todos. Gracias de corazón!"</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card-member">
                    <img src="{{asset('assets/Alex.png')}}" alt="" class="avatar">
                    <h6>Alex Bordón</h6>
                    <a href="https://www.linkedin.com/in/bordonalex/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/bordonalex/</a>
                    <p><em>"Mi agradecimiento va para aquellas personas, que a costa de su propia vida, nos cuidan y protegen día a día."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card-member">
                    <img src="{{asset('assets/Florencia%20De%20Mollein.jpg')}}" alt="" class="avatar">
                    <h6>Florencia De Mollein</h6>
                    <a href="https://www.linkedin.com/in/maría-florencia-de-mollein/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/maría-florencia-de-mollein-a42a5770/</a>
                    <p><em>"A todos los héroes anónimos. A mi familia."</em></p>
                </div>
            </div>
        </div>

        <h3>Back End</h3>
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="https://via.placeholder.com/50.jpg" alt="" class="avatar">
                    <h6>Luciano Kapluk</h6>
                    <a href="https://www.linkedin.com/in/lucianokapluk/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/lucianokapluk/</a>
                    <p><em>"Gracias a todos los héroes que trabajan día a día para cuidarnos, y la Comunidad de desarrolladores que me dejaron ser parte de este proyecto."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/NicolasLiendro.jpeg')}}" alt="" class="avatar">
                    <h6>Nicolás Liendro</h6>
                    <a href="https://www.linkedin.com/in/nicolás-liendro-00248a178/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/nicolás-liendro-00248a178/</a>
                    <p><em>"Gracias a todo el personal médico que, a pasar de las adversidades, siempre ponen el hombro para cuidarnos."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="{{asset('assets/Nahuel%20Villagra.jpg')}}" alt="" class="avatar">
                    <h6>Nahuel Villagra</h6>
                    <a href="https://www.linkedin.com/in/damian-nahuel-villagra-031521158/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/damian-nahuel-villagra-031521158/</a>
                    <p><em>"Gracias a mi familia."</em></p>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card-member">
                    <img src="https://via.placeholder.com/50.jpg" alt="" class="avatar">
                    <h6>Melanie Salzman</h6>
                    <a href="https://www.linkedin.com/in/salzmanmelanie/" target="_blank"><span><i class="fab fa-linkedin"></i></span> linkedin.com/in/salzmanmelanie/</a>
                    <p><em>"Gracias a las personas que dedican su tiempo en ayudar a nuestro país."</em></p>
                </div>
            </div>
        </div>
    </section>

    <section id="contactanos">
        <h3>Contactanos</h3>
        <a href="mailto:hola@teloregalo.com.ar?Subject=Mensage"><p><img src="{{asset('assets/sobreAbierto.svg')}}" alt="">hola@teloregalo.com.ar</p></a>
        <a href="mailto:hola@graciasporcuidarnos.com.ar?Subject=Mensage"><p><img src="{{asset('assets/sobreAbierto.svg')}}" alt="">hola@graciasporcuidarnos.com.ar</p></a>
    </section>

</div>

<!-- Fin contenedor -->
@endsection
