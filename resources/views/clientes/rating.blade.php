  @extends('layouts.app')
  @section('content')
  <!-- Inicio contenedor -->
  <div class="container">

    <!-- Inicio Menú Mis Regalos Héroe -->
    <div id="menuMisRegalosHeroe">
        <ul>
            <li><a  href="{{route('cliente.miperfil')}}">Perfil</a></li>
            <li><a  href="{{route('cliente.rating', Auth::user()->id)}}">Mis regalos</a></li>
        </ul>
    </div>
    <!-- Fin Menú Mis Regalos Héroe -->


    <!-- Inicio contenedor tarjetas -->
    <div id=tarjetasMisRegalos>

        <!-- Inicio contenedor Pendientes -->
        <section id="contenedorPendientes">

            <h2>Pendientes de calificación</h2>

            <!-- Inicio fila 1 -->

            <div class="row">

                <!-- Inicio tarjeta 1.1 -->
                @foreach ($stores as $store)
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        @if($store->avatar)
                               <img src="{{ Storage::url($store->avatar)}}" alt="" class="card-image">
                         @else
                               <img src="https://via.placeholder.com/150" alt="" class="card-image">
                        @endif
                        <div class="card-description"  id="descripcionCard">
                            <h4>{{$store->offer}}</h4>
                            <h5>{{$store->name}}</h5>
                            <p id="direccionCard"><span><i class="fas fa-map-marker-alt"></i></span>{{$store->address}}</p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Fin tarjeta 1.1 -->

            </div>
            <!-- Fin fila 1 -->

        </section>
        <!-- Fin contenedor Pendientes -->

        <!-- Inicio contenedor Calificados -->
        <section id="contenedorCalificados">
            <h2>Calificados</h2>
            <div class="row">
                <!-- Inicio tarjeta 1.1 -->
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" alt="" class="card-image">
                        <div class="card-description"  id="descripcionCard">
                            <h4>Producto</h4>
                            <h5>Nombre de comercio</h5>
                            <p id="direccionCard"><span><i class="fas fa-map-marker-alt"></i></span>Ubicación</p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin contenedor Calificados -->
    </div>
    <!-- Fin contenedor tarjetas -->
</div>
<!-- Fin contenedor -->

@endsection
