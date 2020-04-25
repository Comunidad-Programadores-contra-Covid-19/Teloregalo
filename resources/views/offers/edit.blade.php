@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Actualizar oferta</span>
                <a href="/offers" class="btn btn-primary btn-sm">Volver a lista de ofertas</a>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('offers.update', $offer->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">

                        <label for="name_offer">Nombre de la oferta</label>
                        <input type="text" class="form-control" name="name_offer" value={{ $offer->name_offer }} />
                    </div>

                    <div class="form-group">
                        <label for="description_offer">Descripción de la oferta</label>
                        <input type="text" class="form-control" name="description_offer" value={{ $offer->description_offer }} />
                    </div>

                    <div class="form-group">
                        <label for="cost">Precio</label>
                        <input type="text" class="form-control" name="cost" value={{ $offer->cost }} />
                    </div>
                    <div class="form-group">
                        <label for="amount">Cantidad</label>
                        <input type="text" class="form-control" name="amount" value={{ $offer->amount }} />
                    </div>
                    Habilitar<input type="checkbox" id="is_enabled" class="form-control mb-2" />

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection