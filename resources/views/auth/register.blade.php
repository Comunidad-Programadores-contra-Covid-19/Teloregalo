@extends('layouts.app')

@section('content')
<!-- Inicio contenedor -->
<div class="container">
  
    <img src="{{ asset('assets/registroHeroe.svg') }}" alt="registroHeroe" id="imgRegistroHeroe">
   
    <section id="RegistroHeroe">
        <h1>Registro</h1>
        <p>Al registrarte podrás recibir los regalos que los vecinos hacen en calidad de agradecimiento por tu labor durante la pandemia.</p>
        <form class="col-md-12 col-lg-12" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group ">
                <label for="inputNombreApellido">Nombre y apellido</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputNombreApellido" placeholder="" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email"  id="inputEmail" placeholder="" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPass">Contraseña</label>
                <input type="password"  id="inputPass" placeholder="" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmar contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-check" id="chekRegistroHeroe">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1"><b> Aceptar términos y condiciones</b></label>
            </div>
        
            <p id="tycRegistroHeroe">Al hacer click en "Registrarme" aceptás nuestras condiciones, la Política de Datos y la Política de Cookies.</p>
            <button type="submit" class="btn btn-principal btn-block" id="btnRegistroHeroe">Registrarme</button>
        </form>

        <img src="{{ asset('assets/separador.svg') }}" alt="separador" id="separadorRegistroHeroe">

        <a class="btn btn-principal btn-block" id="btnRegistroHeroeGmail" href="{{ url('/login/google') }}">Registrarme con Gmail</a>
        <a class="btn btn-principal btn-block" id="btnRegistroHeroeFace">Registrarme con Facebook</a>
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
                    <img src="{{ asset('assets/logo.svg') }}" width="35" height="35" alt="">
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

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar como beneficiario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme su contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('O registrate tambien con') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <div class="form-group">
                                <a href="{{ url('/login/google') }}" class="btn btn-primary">Registrarse con Google</a>
                            </div>
                        </div>
                        
                        <div>
                            <div class="form-group">
                                <a href="" class="btn btn-primary">Registrarse con Facebook</a>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
