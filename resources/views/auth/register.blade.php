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
                <select class="form-control" name='profesion' id="profesionesHeroes">
                    <option>Personal de Salud</option>
                    <option>Científicos</option>
                    <option>Fuerzas de seguridad</option>
                    <option>Bomberos</option>
                    <option>Asistentes sociales</option>
                    <option>Transporte</option>
                    <option>Recolectores de residuos/Servicios de limpieza </option>
                    <option>Repartidores</option>
                    <option>Voluntarios </option>
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
                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="isChecked()">
                <a target="_blank" href="{{ url('../terminos-condiciones') }}"><label class="form-check-label" for="exampleCheck1"><b> Aceptar términos y condiciones</b></label></a>
            </div>

            <p id="tycRegistroHeroe">Al hacer click en "Registrarme" aceptás nuestras condiciones, la Política de Datos y la Política de Cookies.</p>
            <button type="submit" class="btn btn-principal btn-block" id="btnRegistroHeroe" disabled>Registrarme</button>
        </form>

        <img src="{{ asset('assets/separador.svg') }}" alt="separador" id="separadorRegistroHeroe">

        <a class="btn btn-principal btn-block disabled" id="btnRegistroHeroeGmail" href="{{ url('/login/google') }}">Registrarme con Gmail</a>
        <a class="btn btn-principal btn-block disabled" id="btnRegistroHeroeFace" disabled>Registrarme con Facebook</a>
    </section>
</div>
<!-- Fin contenedor -->

</div>
</div>

<script>

    function isChecked(){
        checkDom= document.getElementById('exampleCheck1')
        btnRegistroHeroDom= document.getElementById('btnRegistroHeroe')
        btnGoogleDom= document.getElementById('btnRegistroHeroeGmail')
        btnFacebookDom= document.getElementById('btnRegistroHeroeFace')

        if(checkDom.checked){
            btnRegistroHeroDom.disabled = false;
            btnGoogleDom.classList.remove('disabled');
            btnFacebookDom.classList.remove('disabled');
        }else{


        btnGoogleDom.classList.add('disabled');
            btnFacebookDom.classList.add('disabled');
            btnRegistroHeroDom.disabled = true;
        }

    }
</script>


@endsection
