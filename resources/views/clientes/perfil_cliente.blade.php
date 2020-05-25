 @extends('layouts.app')
 @section('content')
 <!-- Inicio contenedor -->
 <div class="container">

    <!-- Inicio Menú Perfil Héroe -->
    <div id="menuPerfilHeroe">
        <ul>
            <li><a  href="{{route('cliente.miperfil')}}">Perfil</a></li>
            <li><a  href="{{route('cliente.mis-regalos')}}">Mis regalos</a></li>
        </ul>
    </div>
    <!-- Fin Menú Perfil Héroe -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Elige una foto de perfil..</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="row" method="POST" action=" {{ route('clientes.updateImage', $userProfile->id) }}"
                          enctype="multipart/form-data">

                        {{ method_field('put') }}
                        {{ csrf_field() }}

                        <div class="modal-body">
                            <input id="file-input" name="avatar" type="file"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alternative" data-dismiss="modal">Cancelar</button>
                            <button type="input" class="btn btn-principal">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Inicio Título con foto -->
    <div id="miPerfilConFoto">
        <h1>Mi perfil</h1>
        <div id="fotoHeroe">
            <div class="image-upload d-flex flex-row-reverse " data-toggle="modal" data-target="#exampleModal">
                <span class="far fa-edit " id="editPicture"></span>
            </div>
             @if($userProfile->avatar)
                <img src="{{ Storage::url( $userProfile->avatar)}}" alt="FotoHeroe">
            @else
                <img src="{{asset('assets/camera_ 1.svg')}}" alt="FotoHeroe">
            @endif

        </div>
    </div>
    <!-- Fin Título con foto -->

    <!-- Inicio Form -->

    <section id="datosPerfilHeroe">
        <form class="col-md-12 col-lg-12" method="POST" action=" {{ route('clientes.updateHero', $userProfile->id) }}" enctype="multipart/form-data">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group ">
                <label for="inputNombreApellido">Nombre y apellido</label>
                <input type="text" class="form-control" name="name" id="inputNombreApellido" value="{{$userProfile->name}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" value="{{$userProfile->email}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputProfesion">Profesión</label>
                <input type="text" class="form-control" name="profesion" id="inputProfesion" value="{{$userProfile->profesion}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputPass">Contraseña</label>
                <input type="password" class="form-control" id="inputPass" placeholder="">
            </div>

            <div class="row">
                <div id="btnGuardarPerfilHeroe">
            <button type="submit" class=" btn-principal">Guardar cambios</button>
            </div>
            <div id="btnCancelarPerfilHeroe">
                <button type="submit" class="btn-alternative">Cancelar</button>
            </div>
        </div>
        </form>
    </section>
    <!-- Fin Form -->
</div>
<!-- Fin contenedor -->
@endsection
