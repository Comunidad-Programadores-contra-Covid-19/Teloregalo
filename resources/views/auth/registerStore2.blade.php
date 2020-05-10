@extends('layouts.app')
@section('content')
{{$storeId=Auth::user()->store->id}}
<div class="container">
    <div class="row">
        <div class="col-lg-6">
    <img src="{{asset('assets/RegistroComercio2.svg')}}" alt="imgRegistro" id="imgRegistroComercio2">
        </div>

        <div class="col-lg-6">
            <section id="RegistroComercio">

        <h1>Paso 2</h1>
        <p>Al registrar tu comercio los vecinos podrán elegirte para comprar regalos a nuestros héroes. </p>
        
        <form  method="POST" action=" {{ route('stores.updateRegister', $storeId) }}"
            enctype="multipart/form-data">
          {{ method_field('put') }}
          @csrf
          <div class="form-group">
            <label for="inputNombreComercio">Nombre del comercio</label>
            <input type="text" id="inputNombrecomercio" placeholder=""
            class="form-control @error('name') is-invalid @enderror" name="name"
             required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group ">
            <label for="inputDireccion">Dirección del comercio</label>


            <input type="text" id="inputDireccion" placeholder="Donde está tu local?"
                   class="form-control @error('address') is-invalid @enderror" name="address"
                   required autocomplete="address">
            @error('address')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputCategoria" id="Category">Categorías</label>
            <select class="form-control" id="inputCategoria" name='category'
                    >
                <option >Cafetería</option>
                <option >Cervecería</option>
                <option >Pizzería</option>
                <option >Farmacia</option>
                <option >Kiosco</option>
                <option >Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inputTel">Teléfono de contacto</label>
            <input type="text" id="inputTel" placeholder=""
                   class="form-control @error('phone') is-invalid @enderror" name="phone"
                    required autocomplete="phone">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <p id="tycRegistroComercio">Al hacer click en "Registrar mi comercio" declarás que toda la información ingresada es real y tenés la capacidad para actuar en representacion del negocio.  </p>
        <button type="submit" class="btn btn-principal btn-block" id="btnRegistroComercio1">Registrar mi
            comercio</button>
        </form>

            </section>

        </div>
    </div>
</div>
@endsection