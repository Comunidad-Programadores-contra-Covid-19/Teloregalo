@extends('layouts.app')

@section('content')
<!-- Inicio contenedor -->
<div class="container">


    <section id="LogIn" class="col-md-12 col-lg-6 center">
        <h1 style="text-align: center">¡Bienvenido Comercio!</h1>
        <br>
        <form method="POST" action="{{ route('login.stores') }}">
            @csrf
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" placeholder="" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPass">Contraseña</label>
                <input type="password" id="inputPass" placeholder=""  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-check" id="checkLogIn">
                <input id="sesionCheck" class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="sesionCheck"><b> Recordarme</b></label>
            </div>
            <br>
            <button type="submit" class="btn btn-principal btn-block" id="btnIngreso">Ingresar</button>
        </form>

        <br>
        <br>
        @if (Route::has('password.request'))
        <p> ¿Olvidaste tu contraseña? no te preocupes <a href="href="{{ route('password.request') }}""><b>te ayudamos a recuperarla</b></a></p>
        <p> Si aún no te registraste hacelo <a href="#"><b>aquí</b></a></p>
                                @endif
     

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
                    <img src="Regursos%20graficos/logo.svg" width="35" height="35" alt="">
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
