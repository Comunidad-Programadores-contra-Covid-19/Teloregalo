@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{asset('assets/RegistroComercio.svg')}}" alt="imgRegistro" id="imgRegistroComercio">
        </div>
        <div class="col-lg-6">
            <section id="RegistroComercio">

                <h1>Paso 1</h1>
                <p>Al registrar tu comercio los vecinos podrán elegirte para comprar regalos a nuestros héroes.</p>
                <form method="POST" action="{{ url('stores/register') }}">
                    {!! csrf_field() !!}
                    <div class="form-group ">
                        <label for="inputNombreComercio">Tu nombre y apellido</label>
                        <input type="text" id="inputNombreComercio" placeholder="" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" id="inputEmail" placeholder="" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPass">Contraseña</label>
                        <input type="password" id="inputPass" placeholder="" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirme su contraseña</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-check" id="chekRegistroComercio">

                        <input type="checkbox" name="terminos" onclick="isChecked()" class="form-check-input" id="exampleCheck1"/>
                        <a target="_blank" href="{{ url('../terminos-condiciones') }}"><label class="form-check-label" for="exampleCheck1"><b> Aceptar términos y condiciones</b></label></a>

                    </div>

                    <p id="tycRegistroComercio">Al hacer click en "Registrar mi comercio" aceptás nuestras <a href="{{ url('terminos-condiciones') }}"><b>condiciones,
                        la Política de Datos y la Política de Cookies.</b></a></p>

                    <button type="submit" class="btn btn-principal btn-block" id="btnRegistroComercio1" disabled>Registrar mi
                        comercio
                    </button>

                </form>
            </section>

        </div>
    </div>
</div>
<script>

    function isChecked(){
        checkDom= document.getElementById('exampleCheck1')
        btnRegistroDom= document.getElementById('btnRegistroComercio1')
        if(checkDom.checked){
            btnRegistroDom.disabled = false;
        }else

            btnRegistroDom.disabled = true;


    }
</script>
@endsection
