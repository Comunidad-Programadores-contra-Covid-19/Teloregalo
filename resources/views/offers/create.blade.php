@extends('layouts.app')

@section('content')
    
    <div class="container">
    
        <div class="row justify-content-center">
    
            <div class="col-md-8">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Agregar oferta</span>
                <a href="/offers" class="btn btn-primary btn-sm">Volver a lista de ofertas</a>
            </div>
            
            <div class="card-body">
                
            <form method="POST" action="/offers">
                @csrf
                <input
                type="text"
                name="name_offer"
                placeholder="Nombre"
                class="form-control mb-2"/>

                <input
                type="text"
                name="description_offer"
                placeholder="Descripción"
                class="form-control mb-2"/>

                <input
                type="text"
                name="cost"
                placeholder="Precio"
                class="form-control mb-2"/>

                <input
                type="number"
                name="amount"
                placeholder="Cantidad"
                class="form-control mb-2"/>

                Habilitar<input
                type="checkbox"
                id="is_enabled"
                class="form-control mb-2"/>

                <button class="btn btn-primary btn-block"
                type="submit">Agregar</button>
                </form>
            </div>

            </div>
            
            </div>
    </div>
    </div>
@endsection