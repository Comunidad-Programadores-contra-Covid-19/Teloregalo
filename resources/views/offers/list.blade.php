@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <img src="https://lifeatbrio.com/wp-content/uploads/2016/11/user-placeholder.jpg" class="rounded mx-auto m-4 d-block col-2" >
        </div>

        <div class="nav nav-tabs row">
    <a class="nav-item nav-link col-4" href="#">Perfil</a>
    <a class="nav-link col-4" href="#">Regalos</a>
    <a class="nav-link active col-4" href="/offers">Catalogo</a>
</div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Ofertas de {{auth()->user()->name}} </span>
                    <a href="/offers/create" class="btn btn-primary btn-sm">Nueva Oferta</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Habilitado</th>
                                <th scope="col"></td>
                                <th scope="col"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $item)
                            <tr>
                                <th scope="row">{{ $item->id}}</th>
                                <td>{{ $item->name_offer}}</td>
                                <td>{{ $item->description_offer}}</td>
                                <td>{{ $item->cost}}</td>
                                <td>{{ $item->amount}}</td>
                                <td>{{ $item->is_enabled}}</td>
                                <td><a href="{{ route('offers.edit',$item->id)}}" class="btn btn-primary btn-sm">Editar</a></td>
                                <td>
                                <form action="{{ route('offers.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$offers->links()}}
                </div>

            </div>

        </div>
    </div>







</div>


@endsection