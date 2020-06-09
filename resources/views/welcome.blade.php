@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TeLoRegalo</title>

    <script src="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css" rel="stylesheet" />
    <link rel="icon" href="assets/logo.svg" sizes="32x32" type="image/svg">
    <link rel="icon" href="assets/logo.svg" sizes="16x16" type="image/svg">
    <script src="https://code.jquery.com/jquery.js"></script>
</head>

<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
    type="text/css"
    />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <!-- Inicio contenedor -->
    <div class="container">
        <!-- Inicio cabecera presentación -->
        <section id="contenedorPresentacion">
            <div class="container features" id="imgPresentacion">
                <img src="{{asset('assets/ilustracionLandingPage.svg')}}" />
            </div>
            <section class="container features" id="presentacion">
                <h1>Ayudá desde casa.</h1>
                <div class="lead text-muted">
                    <p>Sorprendé al personal que hace frente al coronavirus con un regalo y colaborá al mismo tiempo con un comercio de confianza.</p>
                    <br></br>
                    <p>1. Elegí un comercio vecino</p>
                    <p>2. Aboná el regalo</p>
                    <p>3. Un héroe podrá retirar el regalo en el comercio elegido.</p>
                    <br></br>
                </div>
                <div id="btnRegistroRegalo">
                    @guest
                    <a href="{{route('register.stores')}}" class="btn btn-principal" id="btnRegistrar">Registrar comercio</a>
                    @endguest
                    <a href="#Comercios" class="btn btn-alternative" id="btnRegalar">Regalar</a>
                </div>
            </section>
        </section>
        <!-- Fin cabecera presentación -->

                <!-- Inicio Busqueda de comercios -->
                <section id="contenedorBusquedaComercios">
                    <div class="container features" id="contenedorBuscador">
                        <h1>Comercios que ya forman parte</h1>

                        <div id="buscador">
                            <div class="row">

                                <div class="col-lg-3">
                                    <button onclick="setMyUbicationOnMap()" id="btnUbicacion"><img src="{{ asset('assets/ubicacion.svg') }}" alt="">Usar mi ubicación actual</button>
                                </div>

                                <div class="col-lg-4">
                                    <form action="{{ route('stores.index') }}">
                                    <div class="input-group" id="buscarComercio">

                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><img src="{{ asset('assets/lupa.svg') }}" alt=""></button>
                                            </span>
                                                <input name="searchName" id="searchName" type="search" class="form-control" placeholder="Buscar comercio por nombre">

                                    </div>
                                </form>
                                </div>

                                <div class="col-lg-5">
                                    <div class="input-group" id="ingresarDireccion">
                                        <span class="input-group-btn">
                                            <button onclick="setUbicationByAddress()" class="btn btn-default" type="button"><img src="{{ asset('assets/gota.svg') }}" alt=""></button>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Ingresá tu dirección" id="address">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- Fin Busqueda de comercios -->

        <!-- Inicio Botón Lista/Mapa -->
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-alternative active">
              <input id="btnLista" type="radio" name="options" id="option1" autocomplete="off" checked onclick="mostrarLista()"> Lista
            </label>
            <label class="btn btn-alternative">
              <input id="btnMapa" type="radio" name="options" id="option2" autocomplete="off"  onclick="mostrarMapa()"> Mapa
            </label>
        </div>
        <!-- Fin Botón Lista/Mapa -->

        <!-- Inicio contenedor tarjetas -->
        <section id="contenedorTarjetas" class="">

            <!-- Inicio fila 1 -->
            <div class="row" id="contenedorTarjetasHidde">
                <!-- Inicio tarjeta 1.1 -->
                @foreach($stores as $store)

                      <div class="col-md-12 col-lg-6">
                          <div class="card">
                            @if($store->avatar)
                            <img src="{{ Storage::url($store->avatar)}}"  alt="" class="card-image">
                            @else
                            <img src="https://via.placeholder.com/150" alt="" class="card-image">
                            @endif

                              <div class="card-description">
                                  <h3>{{ $store->name}}</h3>
                                  <p><span><i class="fas fa-map-marker-alt"></i></span>{{ $store->address}}</p>
                                  @if ($store->rating != 0)
                                        @for ($i = 1; $i <= $store->rating; $i++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor

                                        @for ($i = 1; $i < 5/$store->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                  @else
                                    @for ($i = 1; $i <= 5; $i++)
                                            <span class="fa fa-star"></span>
                                    @endfor
                                  @endif
                              </div>

                     @if (Auth::user()==true)

                             @if ($store->gifts >= 1)
                              <div class="card-availability">
                                <a href="{{ route('stores.perfil', $store->id) }}" class="btn-alternative"> {{$store->gifts}} para entregar</a>
                              </div>

                              @else
                              <div class="card-availability">
                                  <button disabled  class="btn-sm btn-alternative">{{$store->gifts}} para entregar</button>
                              </div>

                              @endif

                     @else

                              @if ($store->gifts >= 1)
                              <div class="card-availability">
                                <a href="{{ route('login') }}" class="btn-alternative"> {{$store->gifts}} para entregar</a>
                              </div>

                              @else
                              <div class="card-availability">
                                  <button disabled  class="btn-sm btn-alternative">{{$store->gifts}} para entregar</button>
                              </div>

                              @endif

                    @endif




                              <div class="card-btn">
                                  <a href="{{ route('stores.perfil', $store->id) }}" class="btn-principal">Ver productos</a>
                              </div>
                          </div>
                      </div>
                      {{-- <div class="col-md-12 col-lg-6" id="map"></div> --}}
                    @endforeach

                <!-- Fin tarjeta 2.2 -->
            </div>
            <!-- Fin fila 2 -->
        </section>
        <!-- Fin contenedor tarjetas -->
             <!-- Inicio contenedor MAPA tarjetas -->
             <section id="contenedorTarjetas" >


                <div class="row d-none" id="contenedorTarjetasMapHidde">
                    <div class="col-md-12 col-lg-8 ">
                        <div class="map" id="map"></div>
                    </div>
                    <div class="col-md-12 col-lg-4 scrollable">
                        @foreach ($stores as $store)

                            <div class="card-map">
                                @if($store->avatar)
                                    <img src="{{ Storage::url($store->avatar)}}"  alt="" class="card-image-map">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="" class="card-image-map">
                                @endif

                                <div class="card-description-map">
                                    <h6>{{$store->name}}</h6>
                                    <p><span><i class="fas fa-map-marker-alt"></i></span>{{$store->address}}</p>
                                    @if ($store->rating != 0)
                                        @for ($i = 1; $i <= $store->rating; $i++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor

                                        @for ($i = 1; $i < 5/$store->rating; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                    @else
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                    @endif

                                </div>

                                <div class="card-availability-map">
                                    <p><b>{{$store->gifts}}</b> para entregar</p>
                                </div>
                                <div class="card-btn-map">
                                    <a href="#" class="btn-principal">Ver</a>
                                </div>

                            </div>

                            <hr class="solid">
                        @endforeach
                    </div>

                </div>
            </section>
            <!-- Fin contenedor  MAPA tarjetas -->
        </div>
        <!-- Fin contenedor -->
    </div>




    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('./js/search.js')}}"></script>
    <script type="application/javascript">
        function mostrarLista(){
            axios.get('{{ route('stores.search')}}',{
                params:{
                    searchName: '',
                }
            })
            .then(function(res){
                if(res.status==200){
                    console.log(res.data);
                }
                else{
                    console.log("Fallo!");
                }
            });
            //
            const domLista = document.getElementById('contenedorTarjetasHidde')
            const domMapa = document.getElementById('contenedorTarjetasMapHidde')
            domMapa.classList.add('d-none');
            domLista.classList.remove('d-none');

        }
        function mostrarMapa(){

        const domLista= document.getElementById('contenedorTarjetasHidde')
        const domMapa= document.getElementById('contenedorTarjetasMapHidde')
        domMapa.classList.remove('d-none');
        domLista.classList.add('d-none');
        }
    </script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xpZW5kcm8xNCIsImEiOiJjazlvcHU5eWMwMzdzM2hxcTNoN3lleGRmIn0.sPpU8gUReCtWeFS8z0ccsw';
        var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });

        // Codigo boton

        $(document).ready(function() {
            $("#btnRegalar").click(function () {
                $('html,body').animate({
                    scrollTop: $("#contenedorTarjetas").offset().top
                }, 500);
            });
        });

        function setDefaultMap(){

            mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xpZW5kcm8xNCIsImEiOiJjazlvcHU5eWMwMzdzM2hxcTNoN3lleGRmIn0.sPpU8gUReCtWeFS8z0ccsw';
            var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
            var map = new mapboxgl.Map({
                container: "map",
                style: "mapbox://styles/mapbox/streets-v11",
                center: [-65.368819, -35.389050],
                zoom: 3,
            });
        }

        function createMyMap() {
            mapboxgl.accessToken =
            "pk.eyJ1Ijoibmljb2xpZW5kcm8xNCIsImEiOiJjazlvcHU5eWMwMzdzM2hxcTNoN3lleGRmIn0.sPpU8gUReCtWeFS8z0ccsw";
            var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
            //Coordenadas
            getMyCoordinates(function (coordinates) {
                //Creacion del mapa
                var map = new mapboxgl.Map({
                    container: "map",
                    style: "mapbox://styles/mapbox/streets-v11",
                    center: [coordinates[0], coordinates[1]],
                    zoom: 13,
                });
                //Añade marcador al mapa
                let lngLat = new mapboxgl.LngLat(coordinates[0], coordinates[1]);
                let marker = new mapboxgl.Marker().setLngLat(lngLat).addTo(map);

                    //Añade los comercios
                const stores = {!! $stores->toJson() !!};
                for (let index = 0; index < stores.length; index++) {
                    const locationCity = stores[index].address
                    mapboxClient.geocoding
                        .forwardGeocode({
                        query: locationCity,
                        autocomplete: true,
                        limit: 1,
                        })
                        .send()
                        .then(function (response) {
                        if (
                            response &&
                            response.body &&
                            response.body.features &&
                            response.body.features.length
                        ) {
                            var feature = response.body.features[0];
                            //Creacion del mapa
                            //Añade marcador al mapa
                            console.log("Se añade marcador al mapa: "+feature.center);
                            let lngLat = new mapboxgl.LngLat(feature.center[0],feature.center[1]);
                            let marker = new mapboxgl.Marker().setLngLat(lngLat).addTo(map);
                        }
                        });

                }
            });

        }

        function getMyCoordinates(callback, enableHighAccuracy= true) {
            navigator.geolocation.getCurrentPosition(function (position) {
            callback([position.coords.longitude, position.coords.latitude]);
            });
        }

        function setMyUbicationOnMap(){
            createMyMap();
        }
        function setUbicationByAddress(){

            var locationCity = document.getElementById("address").value;
            console.log(locationCity);

            if(locationCity != ""){
                mapboxgl.accessToken =
                "pk.eyJ1Ijoibmljb2xpZW5kcm8xNCIsImEiOiJjazlvcHU5eWMwMzdzM2hxcTNoN3lleGRmIn0.sPpU8gUReCtWeFS8z0ccsw";
                var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
                //Obtencion de coordenadas respecto a la direccion.
                mapboxClient.geocoding
                    .forwardGeocode({
                    query: locationCity,
                    autocomplete: true,
                    limit: 1,
                    })
                    .send()
                    .then(function (response) {
                    if (
                        response &&
                        response.body &&
                        response.body.features &&
                        response.body.features.length
                    ) {
                        debugger;
                        var feature = response.body.features[0];
                        //Creacion del mapa
                        var map = new mapboxgl.Map({
                            container: "map",
                            style: "mapbox://styles/mapbox/streets-v11",
                            center: feature.center,
                            zoom: 15,
                        });
                        //Añade marcador al mapa
                        console.log("Se añade marcador al mapa: "+feature.center);
                        let lngLat = new mapboxgl.LngLat(feature.center[0],feature.center[1]);
                        let marker = new mapboxgl.Marker().setLngLat(lngLat).addTo(map);
                    }
                    });

            //Añade los comercios
            const stores = {!! $stores->toJson() !!};
            for (let index = 0; index < array.length; index++) {
                const locationCity = stores[index].address
                mapboxClient.geocoding
                    .forwardGeocode({
                    query: locationCity,
                    autocomplete: true,
                    limit: 1,
                    })
                    .send()
                    .then(function (response) {
                    if (
                        response &&
                        response.body &&
                        response.body.features &&
                        response.body.features.length
                    ) {
                        debugger;
                        var feature = response.body.features[0];
                        //Creacion del mapa
                        //Añade marcador al mapa
                        console.log("Se añade marcador al mapa: "+feature.center);
                        let lngLat = new mapboxgl.LngLat(feature.center[0],feature.center[1]);
                        let marker = new mapboxgl.Marker().setLngLat(lngLat).addTo(map);
                    }
                    });

            }

            }

        }

        setDefaultMap();
    </script>

</body>
@endsection
</html>
