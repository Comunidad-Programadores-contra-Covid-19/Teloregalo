@extends('layouts.app')

@section('content')
<!-- Inicio contenedor -->
<div class="container">


    <section id="LogIn" class="col-md-12 col-lg-6 center">
        <h1 style="text-align: center">¡Bienvenido Comercio!</h1>
        <br>
        <form method="POST" action="{{ route('login.stores') }}">
            <div class="form-container">
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
        <br>
        @if (Route::has('password.request'))
        <p class="text-center"> ¿No tenés cuenta? <a class="loginform-register-link" href="{{ route('register.stores') }}"><b>Registrarse</b></a></p>
        <p class="text-center"> ¿Olvidaste tu contraseña? ¡No te preocupes! <a href="{{ route('password.request') }}"><b>Te ayudamos a recuperarla</b></a></p>
                                @endif
            </div>
        </form>

     

    </section>
</div>
<!-- Fin contenedor -->

@endsection
