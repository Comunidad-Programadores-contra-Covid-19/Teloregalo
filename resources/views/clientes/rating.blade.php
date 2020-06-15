  @extends('layouts.app')


  <!-- Inicio Estilos y scritp de calificar comercio -->
  @section('styles')

  <link  href="{{ asset('css/rating.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip()
      });
  </script>

  @endsection
  <!-- Fin Estilos y scritp de calificar comercio -->



  @section('content')
  <!-- Inicio contenedor -->
  <div class="container">

    <!-- Inicio Menú Mis Regalos Héroe -->
    <div id="menuMisRegalosHeroe">
        <ul>
            <li><a  href="{{route('cliente.miperfil')}}">Perfil</a></li>
        </ul>
    </div>
    <!-- Fin Menú Mis Regalos Héroe -->
    @if(session()->get('success'))


                        <div class="alert alert-warning alert-dismissible fade show" role="alert">

                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

      @endif


    <!-- Inicio contenedor tarjetas -->
    <div id=tarjetasMisRegalos>

        <!-- Inicio contenedor Pendientes -->
        <section id="contenedorPendientes">

            <h2>Calificar comercio</h2>

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
                            <form action="{{ route('puntuacion', $store->id) }}" method="POST">
                                @csrf
                                <p class="clasificacion">
                                    <input type="hidden" name="otps" value="{{$store->otps}}">
                                  <input id="radio1" type="radio" name="estrellas" value="5">
                                  <label for="radio1" data-toggle="tooltip" data-placement="top" title="Valorar 5 estrellas">★</label>&nbsp; &nbsp;
                                  <input id="radio2" type="radio" name="estrellas" value="4">
                                  <label for="radio2" data-toggle="tooltip" data-placement="top" title="Valorar 4 estrellas">★</label>&nbsp; &nbsp;
                                  <input id="radio3" type="radio" name="estrellas" value="3">
                                  <label for="radio3" data-toggle="tooltip" data-placement="top" title="Valorar 3 estrellas">★</label>&nbsp; &nbsp;
                                  <input id="radio4" type="radio" name="estrellas" value="2">
                                  <label for="radio4" data-toggle="tooltip" data-placement="top" title="Valorar 2 estrellas">★</label>&nbsp; &nbsp;
                                  <input id="radio5" type="radio" name="estrellas" value="1">
                                  <label for="radio5" data-toggle="tooltip" data-placement="top" title="Valorar 1 estrella">★</label>
                                </p>
                                <button type="submit" class="btn-principal">Calificar</button>
                              </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Fin tarjeta 1.1 -->

            </div>
            <!-- Fin fila 1 -->

        </section>
        <!-- Fin contenedor Pendientes -->

    </div>
    <!-- Fin contenedor tarjetas -->
</div>
<!-- Fin contenedor -->

@endsection
