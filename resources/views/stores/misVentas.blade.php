@extends('layouts.app')
@section('content')
<!-- Inicio contenedor -->



    <!-- Inicio Contenedor Ventas del comercio -->
 <!-- Inicio contenedor -->
<div class="container">

    <!-- Inicio Menú Comercio-->
    <div id="menuMisProductos">
        <ul class="nav flex-lg-column justify-content-center nav-pills " id="myTab" role="tablist">
            <li ><a class="nav-item" id="nav-perfil-tab"    href="{{route('stores.miPerfil')}}"  aria-controls="nav-perfil" aria-selected="false">Perfil</a></li>
            <li ><a class="nav-item active" id="nav-ventas-tab" href="{{route('stores.misVentas')}}"  aria-controls="nav-ventas" aria-selected="true">Ventas</a></li>
            <li><a class="nav-item " id="nav-productos-tab"  href="{{route('stores.misProductos')}}"  aria-controls="nav-productos" aria-selected="false">Productos</a></li>
        </ul>
    </div>
    <!-- Fin Menú Comercio -->

    <!-- Inicio Contenedor Ventas del comercio -->
    <div id="contenedorMisVentas">

        <h1 id="tituloVentas">Ventas</h1>

        <p id="subtituloVentas">Ingresá el código de validación para registrar la entrega.</p>
        <!-- Inicio ingresar código -->
        <div class="row">
            <div class="col-lg-3">
                <img src="{{asset('assets/ticketEntrega.svg')}}" alt="ticket" id="imgCodigoVal">
            </div>

            <div class="col-lg-9">
                <div id="codigoValidacion">
                    <!-- Modal Trigger -->
                    <label for="inputCodigo"></label>


                    <form action="{{ route('otps.destroy', Auth::user()->id) }}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <input type="text" name="codigo" id="inputCodigo" placeholder="Código de validación">

                            <button type="submit" class="btn btn-principal btn-block " data-toggle="modal"
                            data-target="#exampleModal" id="btnRegistrarEntrega">Registrar entrega
                    </button>
                 </form>
                 @if(Session::has('info'))
                 <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
                    {{ Session::get('info') }}
                </div>
            @endif


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><b>¡La entrega del regalo fue
                                        realizada con éxito!</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>NOTA: </b>Si considerás que la persona a la que acabás de entregarle un regalo no
                                    pertenece al personal esencial, hacé click en la opción reportar usuario.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnReportar">Reportar usuario</button>
                                    <button type="button" class="btn btn-principal" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal -->

                    <!-- Inicio Reportar usuario -->
                    <!--  <div id="reportarUsuario">
                          <p>Si creés que el usuario no es personal esencial, te recomendamos entregar el producto y luego reportarlo.</p>
                          <button id="btnReportar">Reportar usuario</button>
                      </div> -->
                    <!-- Fin Reportar usuario -->
                </div>

            </div>
            <div class="row mt-5">
                <div id="descrVentas">
                    <p><span><i class="fas fa-exclamation-circle"></i></span>Queda a total discreción del comerciante
                        entregar los regalos a las personas que acrediten estar trabajando para ayudarnos a todos.
                    </p>
                    <p><span><i class="fas fa-exclamation-circle"></i></span>Si creés que el usuario no es personal
                        esencial, te recomendamos entregar el producto y luego reportarlo.</p>
                </div>

                <section id="stock">
                    <div id="stockProducto">
                        <div class="row text-center"
                             id="vtasProd">
                            <div class="col-lg-4">
                                <h5 id="nombreProductoVentas">Opción Producto</h5>
                                <ul>
                                    <span id="totalStock">
                                    <li>
                                        <p id="tituloStock">Disponibles</p>
                                        <p id="cantidadProd">XX</p>
                                    </li>
                                    <li>
                                        <p id="tituloStock" style="opacity: 50%;">Entregados</p>
                                        <p id="cantidadProd" style="opacity: 50%;">XX</p>
                                    </li>
                                </span>
                                    <li>
                                        <span id="totalVendidos">
                                            <p id="tituloStockVendidos">Total vendidos</p>
                                            <p id="cantidadProdVendidos">XX</p>
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-4">
                                <h5 id="nombreProductoVentas">Opción Producto</h5>
                                <ul>
                                    <span id="totalStock">
                                    <li>
                                        <p id="tituloStock">Disponibles</p>
                                        <p id="cantidadProd">XX</p>
                                    </li>
                                    <li>
                                        <p id="tituloStock" style="opacity: 50%;">Entregados</p>
                                        <p id="cantidadProd" style="opacity: 50%;">XX</p>
                                    </li>
                                </span>
                                    <li>
                                        <span id="totalVendidos">
                                            <p id="tituloStockVendidos">Total vendidos</p>
                                            <p id="cantidadProdVendidos">XX</p>
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-4 ">
                                <h5 id="nombreProductoVentas">Opción Producto</h5>
                                <ul>
                                    <span id="totalStock">
                                    <li>
                                        <p id="tituloStock">Disponibles</p>
                                        <p id="cantidadProd">XX</p>
                                    </li>
                                    <li>
                                        <p id="tituloStock" style="opacity: 50%;">Entregados</p>
                                        <p id="cantidadProd" style="opacity: 50%;">XX</p>
                                    </li>
                                </span>
                                    <li>
                                        <span id="totalVendidos">
                                            <p id="tituloStockVendidos">Total vendidos</p>
                                            <p id="cantidadProdVendidos">XX</p>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Fin ingresar código -->

        <!-- Inicio Stock de Productos -->

        <!-- Fin Stock de Productos -->
    </div>

</div>
<!-- Fin contenedor -->

<!-- Fin contenedor -->
@endsection
