@extends('layouts.app')

@section('content')
    <?php $storeInfo = Auth::user()->store ?>
    <?php $userInfo = Auth::user()?>
    <div class='container'>
        <div id="menuMisProductos">
            <ul class="nav flex-lg-column justify-content-center nav-pills " id="myTab" role="tablist">
                <li><a class="nav-item" id="nav-perfil-tab" href="{{route('stores.miPerfil')}}"
                       aria-controls="nav-perfil" aria-selected="false">Perfil</a></li>
                <li><a class="nav-item " id="nav-productos-tab" href="{{route('stores.misProductos')}}"
                    aria-controls="nav-productos" aria-selected="false">Productos</a></li>
                <li><a class="nav-item active" id="nav-ventas-tab" href="{{route('stores.misVentas')}}"
                    aria-controls="nav-ventas" aria-selected="true">Entrega de productos</a></li>
            </ul>
        </div>
        <h1 class="tituloPerfilCom">Perfil</h1>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Elige una foto de perfil..</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="row" method="POST" action=" {{ route('stores.updateImage', $storeInfo->id) }}"
                          enctype="multipart/form-data">

                        {{ method_field('put') }}
                        {{ csrf_field() }}

                        <div class="modal-body pl-3">
                            <input id="file-input" name="avatar" type="file"/>
                        </div>
                        <div class="modal-footer pl-3">
                            <button type="button" class="btn btn-alternative" data-dismiss="modal">Cancelar</button>
                            <button type="input" class=" btn btn-principal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form class="row" method="POST" action=" {{ route('stores.update', $storeInfo->id) }}"
              enctype="multipart/form-data">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="col-md-auto mb-5">
                <div class="logoPerfil">
                    <div class="image-upload d-flex flex-row-reverse " data-toggle="modal" data-target="#exampleModal">
                        <span class="far fa-edit "></span>
                    </div>
                    @if($storeInfo->avatar)
                        <img src="{{ Storage::url($storeInfo->avatar)}}" alt="FotoHeroe">
                    @else
                        <img src="{{asset('assets/camera_ 1.svg')}}" alt="FotoHeroe">
                    @endif
                </div>
            </div>


            <div class="col text-center mt-3 mb-5">
                <h4>La Url de tu negocio es:</h4>
                <p>https://teloregalo.com.ar/store/{{$storeInfo->id}}</p>
                <div class="sharethis-inline-share-buttons" data-url="https://www.teloregalo.com.ar/store/{{$storeInfo->id}}"></div>
            </div>

            <div class="col-lg-6">

                <section>
                    @if(session()->get('success'))


                        <div class="alert alert-warning alert-dismissible fade show" role="alert">

                            <strong>{{ session()->get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                    <div class="form-group ">
                        <label for="inputNombrecomercio">Nombre del comercio</label>
                        <input type="text" id="inputNombrecomercio" placeholder=""
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ $storeInfo->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" readonly
                               value="{{ $userInfo->email }}">
                    </div>
                    <!--  <div class="form-group">
                          <label for="inputPass">Contraseña</label>

                          <input type="password" class="form-control" id="inputPass" placeholder="">
                      </div>-->


                </section>
            </div>

            <div class="col-lg-6">
                <section>

                    <div class="form-group ">
                        <label for="inputDireccion">Dirección del comercio</label>


                        <input type="text" id="inputDireccion" placeholder="Donde está tu local?"
                               class="form-control @error('address') is-invalid @enderror" name="address"
                               value="{{ $storeInfo->address }}" required autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputNombreApellido">Tu nombre y apellido</label>
                        <input type="text" class="form-control" id="inputNombreApellido" name="nombreCompleto" placeholder=""
                               value="{{ $userInfo->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputTel">Teléfono de contacto</label>
                        <input type="text" id="inputTel" placeholder=""
                               class="form-control @error('phone') is-invalid @enderror" name="phone"
                               value="{{ $storeInfo->phone }}" required autocomplete="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </section>

            </div>

            <div class="col-12 mb-3 mt-3">
                <hr class="solid">
            </div>

            <div class="col-lg-6">
                <section>

                    <div class="form-group">
                        <label for="inputCategoria" id="Category">Categorías</label>
                        <select class="form-control disabled" id="inputCategoria" name='category'
                                selected="{{ $storeInfo->category}}">
                            <option {{ ($storeInfo->category == 'Cafetería') ? "selected" : ""}}>Cafetería</option>
                            <option {{ ($storeInfo->category == 'Cervecería') ? "selected" : ""}}>Cervecería</option>
                            <option {{ ($storeInfo->category == 'Pizzería') ? "selected" : ""}}>Pizzería</option>
                            <option {{ ($storeInfo->category == 'Farmacia') ? "selected" : ""}}>Farmacia</option>
                            <option {{ ($storeInfo->category == 'Kiosco') ? "selected" : ""}}>Kiosco</option>
                            <option {{ ($storeInfo->category == 'Otro') ? "selected" : ""}}>Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputDesc">Descripción</label>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                  name="description" required autocomplete="description" id="inputDesc" rows="3">{{ $storeInfo->description }}
                        </textarea>
                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section>
                    <div class="form-group">
                        <label for="inputFace">Link perfil de Facebook</label>
                        <input type="text" name="facebook" class="form-control" id="inputFace"
                               value="{{ $storeInfo->facebook }}">

                    </div>
                    <div class="form-group">
                        <label for="inputInsta">Link perfil de Instagram</label>
                        <input type="text" name="instagram" class="form-control" id="inputInsta"
                               value="{{ $storeInfo->instagram}}">
                    </div>

                    <div class="form-group">
                        <label for="inputHorario">Horarios</label>
                        <input type="text" class="form-control" name="horarios" id="inputHorario"
                               value="{{ $storeInfo->horarios }}">
                        <p class="text-muted">Ejemplo: Lunes a Viernes de 9:00 a 18:00. Sabados de 10:00 a 13:00</p>
                    </div>

                </section>
            </div>


            {{-- <div class="mercadoPago" >
                @if(!$storeInfo->vinculado)
                    <a id="mercadoPago" class="btn"
                       href="https://auth.mercadopago.com.ar/authorization?client_id=5661899751765285&response_type=code&platform_id=mp&redirect_uri=https%3A%2F%2Fteloregalo.com.ar/procesar-pago">
                        Vincular mi cuenta de mercado pago
                    </a>
                @else
                     <a id="mercadoPago" class="btn" style='pointer-events: none; cursor: default; font-size:15px;' >
                        Tu cuenta esta vinculada a mercado pago
                    </a>
                @endif
            </div> --}}

            <div class="col-lg-12 mt-5">
                <div class="row">
                    <div class="col-4">
                        <button class="btn btn-alternative btn-block">Cancelar</button>
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-principal btn-block mb-5">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="mpModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <strong> ¡Ya casi estas listo!</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4 text-center" id="result">
                    <h1 style="font-family: Poppins Sans-serif,sans-serif; color: #96D293; font-weight: bold; font-size: 30px; margin: 5px;"> <strong>Vinculá tu cuenta de Mercado Pago</strong> </h1>
                    <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 18px; line-height: 25px; text-align: justify;
                color: #263238; padding: 10px;">Es importante que vincules tu cuenta <b class="text-info">Mercado Pago</b> para poder empezar a operar en el sitio. <br> <br>
                Si no tenes una cuenta, no te preocupes, presionando el siguiente botón también vas a poder crearla.</p>


                <form class="d-inline"  method="POST" action="{{ url('https://auth.mercadopago.com.ar/authorization?client_id=5661899751765285&response_type=code&platform_id=mp&redirect_uri=https%3A%2F%2Fteloregalo.com.ar/procesar-pago') }}">
                    @csrf
                    <button type="submit" class="btn-principal">{{ __('Vincular mi cuenta de mercado pago') }}</button>.
                </form>

                <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 23px;">El equipo de <b>teloregalo</b>
                    <img style="max-width: 50px; height: auto; margin-left: 15px; margin-top: 15px;" alt="Logo Te lo regalo"
                         src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzU2IiBoZWlnaHQ9IjM0MSIgdmlld0JveD0iMCAwIDM1NiAzNDEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+DQo8cGF0aCBkPSJNMzU1LjI0NyAxOTUuNzc4QzM1Mi44MzcgMTg2Ljk5NCAzNDQuMDMgMTc4Ljk1NyAzMzAuMjE2IDE4MC41NDZWODYuOTA4N0MzMzcuNjMzIDg2LjYyODQgMzQzLjU2NiA4MC40NjA3IDM0My41NjYgNzIuODkxMlY0NS41MTAzQzM0My41NjYgMzcuNzUzOSAzMzcuMzU1IDMxLjQ5MjcgMzI5LjY2IDMxLjQ5MjdIMzA2Ljc2MUwyOTQuMjQ1IDkuNjI1MzhDMjkxLjY0OSA1LjEzOTc2IDI4Ny41NyAxLjk2MjQ2IDI4Mi41NjQgMC42NTQxNTJDMjc3LjU1OCAtMC42NTQxNTIgMjcyLjM2NiAwIDI2OC4wMDkgMi42MTY2MUwyMTguMzE3IDMxLjU4NjJIMjAyLjc0MkwxNTIuOTU4IDIuNjE2NjFDMTQ4LjUwOCAwIDE0My4zMTYgLTAuNjU0MTUyIDEzOC40MDMgMC42NTQxNTJDMTMzLjM5NiAxLjk2MjQ2IDEyOS4zMTcgNS4yMzMyMSAxMjYuNzIxIDkuNjI1MzhMMTE0LjIwNiAzMS40OTI3SDkxLjMwNjdDODMuNjExOSAzMS40OTI3IDc3LjQwMDQgMzcuNzUzOSA3Ny40MDA0IDQ1LjUxMDNWNzIuODkxMkM3Ny40MDA0IDgwLjQ2MDcgODMuMzMzNyA4Ni41MzQ5IDkwLjc1MDQgODYuOTA4N1YxODIuNzg5QzY4Ljc3ODUgMTg4LjAyMiA1MS4zNDk0IDIwMC44MjUgMzcuODEzOSAyMjEuNjY0QzMzLjkyMDIgMjE4LjY3NCAyOS4yODQ4IDIxNi44OTggMjQuMjc4NSAyMTYuNzExQzE3Ljk3NDQgMjE2LjQzMSAxMi4wNDEgMjE4LjY3NCA3LjQwNTYgMjIyLjk3MkMtMi4wNTA2NSAyMzEuODUgLTIuNjA2OSAyNDYuODAyIDYuMjkzMSAyNTYuMzM0TDc3LjY3ODUgMzMzLjQzQzgyLjMxNCAzMzguMzgzIDg4LjUyNTQgMzQwLjkwNiA5NC44Mjk2IDM0MC45MDZDMTAwLjU3OCAzNDAuOTA2IDEwNi4zMjUgMzM4Ljg1MSAxMTAuNzc1IDMzNC41NTJDMTE1LjMxOCAzMzAuMjUzIDExOC4wMDcgMzI0LjM2NiAxMTguMTkyIDMxOC4xMDVDMTE4LjM3OCAzMTEuODQzIDExNi4xNTMgMzA1Ljc2OSAxMTEuODg4IDMwMS4xOUwxMDkuMjkyIDI5OC4zODdMMTI2LjYyOSAyNzEuNTY2TDE2Ni43NzEgMjczLjQzNUMxOTYuNDM4IDI3NC44MzcgMjA1Ljg5NCAyNzMuMzQyIDIzNC4zNTYgMjYyLjk2OUMyNTYuMzI4IDI1NC45MzIgMjgzLjg2MiAyNDMuOTk5IDMwNS45MjcgMjM1LjIxNEMzMjEuNzggMjI4Ljk1MyAzMzUuNDA4IDIyMy41MzMgMzQwLjUwNyAyMjEuNzU3QzM0MC41MDcgMjIxLjc1NyAzNDAuNTA3IDIyMS43NTcgMzQwLjU5OSAyMjEuNzU3QzM1My43NjQgMjE3LjM2NSAzNTcuODQzIDIwNS4zMSAzNTUuMjQ3IDE5NS43NzhaTTMyOS42NiA3Mi44OTEySDI0Mi4xNDNWNDUuNTEwM0gzMjkuNjZWNzIuODkxMlpNMTkyLjczIDg2LjkwODdIMjI4LjIzN1YxMzYuODExTDIxMi40NzYgMTMxLjk1MkMyMTEuMTc5IDEzMS41NzggMjA5LjY5NSAxMzEuNTc4IDIwOC4zOTcgMTMxLjk1MkwxOTIuNjM3IDEzNi44MTFWODYuOTA4N0gxOTIuNzNaTTE5Mi43MyA3Mi44OTEyVjQ1LjUxMDNIMjI4LjIzN1Y3Mi44OTEySDE5Mi43M1pNMjc0Ljk2MiAxNC43NjUxQzI3Ni4xNjcgMTQuMDE3NSAyNzcuNjUgMTMuODMwNiAyNzkuMDQxIDE0LjIwNDRDMjgwLjQzMiAxNC41NzgyIDI4MS41NDQgMTUuNDE5MyAyODIuMjg2IDE2LjcyNzZMMjkwLjgxNSAzMS41ODYySDI0Ni4yMjJMMjc0Ljk2MiAxNC43NjUxWk0xMzguNjgxIDE2LjcyNzZDMTM5LjQyMiAxNS41MTI3IDE0MC41MzUgMTQuNTc4MiAxNDEuOTI1IDE0LjIwNDRDMTQzLjMxNiAxMy44MzA2IDE0NC43MDcgMTQuMDE3NSAxNDYuMDA1IDE0Ljc2NTFMMTc0LjgzNyAzMS41ODYySDEzMC4yNDRMMTM4LjY4MSAxNi43Mjc2Wk05MS4zMDY3IDQ1LjUxMDNIMTc4LjgyM1Y3Mi44OTEySDE3Mi4yNDFDMTY4LjQ0IDcyLjg5MTIgMTY1LjI4OCA3Ni4wNjg1IDE2NS4yODggNzkuOUMxNjUuMjg4IDgzLjczMTQgMTY4LjQ0IDg2LjkwODcgMTcyLjI0MSA4Ni45MDg3SDE3OC44MjNWMTQ2LjM0M0MxNzguODIzIDE0OC41ODYgMTc5Ljg0MyAxNTAuNjQyIDE4MS42MDUgMTUxLjk1QzE4My4zNjYgMTUzLjI1OCAxODUuNjg0IDE1My42MzIgMTg3LjgxNiAxNTIuOTc4TDIxMC41MyAxNDUuOTY5TDIzMy4yNDMgMTUyLjk3OEMyMzMuODkyIDE1My4xNjUgMjM0LjYzNCAxNTMuMjU4IDIzNS4yODMgMTUzLjI1OEMyMzYuNzY2IDE1My4yNTggMjM4LjI0OSAxNTIuNzkxIDIzOS40NTUgMTUxLjg1N0MyNDEuMjE2IDE1MC41NDggMjQyLjIzNiAxNDguMzk5IDI0Mi4yMzYgMTQ2LjI1Vjg2LjkwODdIMzE2LjQwM1YxODMuNjNMMjYzLjE4OCAxOTYuMTUyQzI2MC45NjMgMTg1Ljk2NiAyNTEuNTA3IDE3OC44NjQgMjQxLjAzMSAxNzkuNzk4QzIzNy4zMjIgMTgwLjE3MiAyMjQuODA3IDE4MS40OCAyMTEuNTQ5IDE4Mi44ODJDMTk4Ljk0MSAxODQuMjg0IDE4NS44NjkgMTg1LjY4NiAxODIuMzQ2IDE4NS45NjZDMTc0LjgzNyAxODYuNjIgMTY1LjEwMyAxODUuMjE4IDE1My42OTkgMTgzLjUzNkMxMzguNTg4IDE4MS4yOTMgMTIxLjgwOCAxNzguODY0IDEwNC43NDkgMTgwLjQ1MlY4Ni45MDg3SDEwOS43NTZDMTEzLjU1NyA4Ni45MDg3IDExNi43MDkgODMuNzMxNCAxMTYuNzA5IDc5LjlDMTE2LjcwOSA3Ni4wNjg1IDExMy41NTcgNzIuODkxMiAxMDkuNzU2IDcyLjg5MTJIOTEuMzA2N1Y0NS41MTAzWk0xMDEuMjI2IDMyNC4zNjZDOTcuNDI1NCAzMjguMDEgOTEuMzA2NyAzMjcuNzMgODcuNzgzNyAzMjMuODk5TDE2LjM5ODMgMjQ2LjgwMkMxMi43ODI3IDI0Mi45NzEgMTMuMDYwOCAyMzYuODAzIDE2Ljg2MTkgMjMzLjI1MkMxOC43MTYgMjMxLjQ3NiAyMS4xMjY0IDIzMC41NDIgMjMuNzIyMyAyMzAuNjM1QzI2LjIyNTQgMjMwLjcyOSAyOC42MzU4IDIzMS44NSAzMC4zOTczIDIzMy43MTlMMTAxLjc4MyAzMTAuODE2QzEwMy41NDQgMzEyLjY4NSAxMDQuMzc5IDMxNS4xMTQgMTA0LjM3OSAzMTcuNzMxQzEwNC4xOTMgMzIwLjI1NCAxMDMuMTczIDMyMi42ODQgMTAxLjIyNiAzMjQuMzY2Wk0zMzYuMTQ5IDIwOC42NzRDMzMwLjY4IDIxMC41NDMgMzE3LjUxNSAyMTUuNzc3IDMwMC45MiAyMjIuMzE4QzI3OC45NDggMjMxLjEwMiAyNTEuNTA3IDI0MS45NDMgMjI5LjcyIDI0OS44ODZDMjAyLjkyOCAyNTkuNjA1IDE5NS40MTggMjYwLjgyIDE2Ny41MTMgMjU5LjUxMUwxMjMuMzg0IDI1Ny40NTVDMTIwLjk3MyAyNTcuMzYyIDExOC41NjMgMjU4LjU3NyAxMTcuMjY1IDI2MC42MzNMOTkuNjUwNCAyODcuODI3TDQ3LjgyNjQgMjMxLjg1Qzc1LjgyNDQgMTg2LjI0NiAxMTcuODIxIDE5Mi4zMjEgMTUxLjY2IDE5Ny4yNzNDMTYzLjM0MSAxOTguOTU2IDE3NC4zNzMgMjAwLjYzOCAxODMuNDU5IDE5OS43OTdDMTg3LjE2NyAxOTkuNDIzIDE5OS42ODMgMTk4LjExNSAyMTIuOTQgMTk2LjcxM0MyMjUuNTQ4IDE5NS4zMTEgMjM4LjYyIDE5My45MDkgMjQyLjIzNiAxOTMuNjI5QzI0Ni4wMzcgMTkzLjI1NSAyNDkuMzc0IDE5Ni4xNTIgMjQ5Ljc0NSAxOTkuODlDMjQ5LjgzOCAyMDEuMTA1IDI1MC4xMTYgMjA0LjI4MiAyNDEuNDAxIDIwNy45MjdDMjIyLjc2NyAyMTUuNzc3IDIwMy4wMiAyMjIuMzE4IDE4Ny4xNjcgMjI1Ljk2M0MxODMuNDU5IDIyNi44MDQgMTgxLjA0OCAyMzAuNTQyIDE4MS44ODMgMjM0LjM3M0MxODIuNzE3IDIzOC4xMTEgMTg2LjQyNSAyNDAuNTQxIDE5MC4yMjYgMjM5LjdDMjA2LjgyMSAyMzUuODY4IDIyNy40MDMgMjI5LjA0NyAyNDYuNzc5IDIyMS4wMUMyNTMuNDU0IDIxOC4yMDYgMjU3LjcxOCAyMTQuNzQ5IDI2MC4yMjEgMjExLjI5MUwzMzAuMDMxIDE5NC45MzdDMzM3LjQ0NyAxOTMuMzQ5IDM0MS4wNjMgMTk2LjMzOSAzNDEuOTkgMTk5LjcwM0MzNDIuNzMyIDIwMi43ODcgMzQxLjM0MSAyMDYuODA1IDMzNi4xNDkgMjA4LjY3NFoiIGZpbGw9IiMyRTJDMkMiLz4NCjxwYXRoIGQ9Ik0xNDAuOTE3IDg2LjkwOTRDMTQ0LjcxOCA4Ni45MDk0IDE0Ny44NyA4My43MzIxIDE0Ny44NyA3OS45MDA2QzE0Ny44NyA3Ni4wNjkxIDE0NC44MSA3Mi44OTE4IDE0MC45MTcgNzIuODkxOEMxMzcuMTE2IDcyLjg5MTggMTMzLjk2NCA3Ni4wNjkxIDEzMy45NjQgNzkuOTAwNkMxMzMuOTY0IDgzLjczMjEgMTM3LjExNiA4Ni45MDk0IDE0MC45MTcgODYuOTA5NFoiIGZpbGw9IiMyRTJDMkMiLz4NCjwvc3ZnPg0KIA=="/>
                </p>


                </div>
            </div>
        </div>
    </div>


   {{--   <div class="modal fade" id="mpModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¡Ya casi estas listo!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="result">
                    <img id="imgMp" src="{{ asset('assets/money_transfer_.svg') }}" alt="ilustracion transferencia" id="imgRegistroHeroe">
                    <h1>Vinculá tu cuenta de Mercado Pago</h1>
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <p>Es importante que vincules tu cuenta <b>Mercado Pago</b> para poder empezar a operar en el sitio.</p>
                            <p>Si no tenes una cuenta, no te preocupes, presionando el siguiente botón también vas a poder crearla.</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a id="mercadoPago" class="btn"
                    href="https://auth.mercadopago.com.ar/authorization?client_id=5661899751765285&response_type=code&platform_id=mp&redirect_uri=https%3A%2F%2Fteloregalo.com.ar/procesar-pago">
                        Vincular mi cuenta de mercado pago
                    </a>
                </div>
            </div>
        </div>
    </div>  --}}

    {{-- Esta mal que esto este aca, pero no se estaba incluyendo JQuery y lo necesitaba. Hay que incluirlo bien en el layout --}}
    <script src="https://code.jquery.com/jquery.js"></script>

    @if(!$storeInfo->vinculado)
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#mpModal').modal('show');
            });
        </script>
    @endif


@endsection
