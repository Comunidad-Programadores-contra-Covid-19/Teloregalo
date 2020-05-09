@extends('layouts.app')

@section('content')
<!-- Inicio contenedor -->
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('assets/registroHeroe.svg') }}" alt="registroHeroe" id="imgRegistroHeroe">
        </div>
    <div class="col-lg-6">
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
                <label for="profesionesHeroes">Profesión</label>
                <select class="form-control" id="profesionesHeroes">
                    <option>Profesión 1</option>
                    <option>Profesión 2</option>
                    <option>Profesión 3</option>
                    <option>Profesión 4</option>
                    <option>Profesión 5</option>
                </select>
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

</div>
</div>




@endsection
