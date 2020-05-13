@extends('layouts.app')

@section('content')
    <?php $storeInfo = Auth::user()->store ?>
    <?php $userInfo = Auth::user()?>
    <div class='container'>
        <div id="menuMisProductos">
            <ul class="nav flex-lg-column justify-content-center nav-pills " id="myTab" role="tablist">
                <li><a class="nav-item" id="nav-perfil-tab" href="{{route('stores.miPerfil')}}"
                       aria-controls="nav-perfil" aria-selected="false">Perfil</a></li>
                <li><a class="nav-item active" id="nav-ventas-tab" href="{{route('stores.misVentas')}}"
                       aria-controls="nav-ventas" aria-selected="true">Ventas</a></li>
                <li><a class="nav-item " id="nav-productos-tab" href="{{route('stores.misProductos')}}"
                       aria-controls="nav-productos" aria-selected="false">Productos</a></li>
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

                        <div class="modal-body">
                            <input id="file-input" name="avatar" type="file"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="input" class="btn btn-primary">Guardar</button>

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
                <p>https://www.figma.com/file/8mOR2VUQF08JLjzeHQBfC2/</p>
                <button class="btn btn-principal">Compartir</button>
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
                    <div class="form-group">
                        <label for="inputPass">Contraseña</label>

                        <input type="password" class="form-control" id="inputPass" placeholder="">
                    </div>


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
                        <input type="text" class="form-control" id="inputNombreApellido" placeholder=""
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
                        <select class="form-control" id="inputCategoria" name='category'
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
                    </div>

                    <a class="btn btn-alternative btn-block"
                       href="https://auth.mercadopago.com.ar/authorization?client_id=5661899751765285&response_type=code&platform_id=mp&redirect_uri=https%3A%2F%2Fteloregalo.com.ar/procesar-pago">
                        Vincular mi cuenta de mercado pago
                    </a>
                </section>
            </div>

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

    {{-- <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">

                    <div class="card-body">


                        <form method="POST" action=" {{ route('stores.update', $storeInfo->id) }}">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del comercio') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $storeInfo->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $storeInfo->address }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $storeInfo->phone }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                                <div class="col-md-6">
                                    <input id="category" type="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $storeInfo->category }}" required autocomplete="category">

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $storeInfo->description }}" required autocomplete="description">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>

                                <div class="col-md-6">
                                    <input id="facebook" type="facebook" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $storeInfo->facebook }}" required autocomplete="facebook">

                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar Cambios') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
