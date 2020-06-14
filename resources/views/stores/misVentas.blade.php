@extends('layouts.app')
@section('content')
<!-- Inicio contenedor -->



    <!-- Inicio Contenedor Ventas del comercio -->
 <!-- Inicio contenedor -->
<div class="container">

    <!-- Inicio Menú Comercio-->
    <div id="menuMisProductos">
        <ul class="nav flex-lg-column justify-content-center nav-pills " id="myTab" role="tablist">
            <li><a class="nav-item" id="nav-perfil-tab" href="{{route('stores.miPerfil')}}"
                   aria-controls="nav-perfil" aria-selected="false">Perfil</a></li>
            <li><a class="nav-item " id="nav-productos-tab" href="{{route('stores.misProductos')}}"
                aria-controls="nav-productos" aria-selected="false">Productos</a></li>
            <li><a class="nav-item active" id="nav-ventas-tab" href="{{route('stores.misVentas')}}"
                aria-controls="nav-ventas" aria-selected="true">Entrega de productos</a></li>
        </ul>
    </div>
    <!-- Fin Menú Comercio -->

    <!-- Inicio Contenedor Ventas del comercio -->
    <div id="contenedorMisVentas">

        <h1 id="tituloVentas">Entrega de productos</h1>

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


                    {{-- <form action="{{ route('otps.destroy', Auth::user()->id) }}" method="POST">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE"> --}}

                        <input type="text" name="codigo" id="inputCodigo" placeholder="Código de validación">

                        <button id="sendcode" class="btn btn-principal btn-block">Registrar entrega
                    </button>
                 {{-- </form> --}}
                 {{-- @if(Session::has('info')) --}}
                 <div id="infoCard" class="alert alert-info d-none">
                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
                    <span id="infoMessage"></span>
                    {{-- {{ Session::get('info') }} --}}
                </div>
            {{-- @endif --}}


                    <!-- Modal -->
                    <div class="modal fade" id="successCodeModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalLabel"><b>¡Excelente! Entregá el regalo.</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>NOTA: </b>Si considerás que la persona que retira el producto no es un trabajador esencial,
                                    te recomendamos entregar el regalo y luego seleccioná la opción “Reportar usuario”. <br>
                                    <button type="button" id="btnReportar">Reportar usuario</button>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-principal btn-block" data-dismiss="modal">Regalo entregado con éxito</button>
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

                            @foreach ($storeOffers as $offer)
                                <div class="col-lg-4">
                                    <h5 id="offerName-{{$offer->id}}">{{$offer->name_offer}}</h5>
                                    <ul>
                                        <span id="totalStock">
                                        <li>
                                            <p id="tituloStock">Disponibles</p>
                                            <p id="offerAmount-{{$offer->id}}">{{$offer->amount}}</p>
                                        </li>
                                        <li>
                                            <p id="tituloStock" style="opacity: 50%;">Entregados</p>
                                            <p id="offerDelivered-{{$offer->id}}" style="opacity: 50%;">{{$offer->total_amount - $offer->amount}}</p>
                                        </li>
                                    </span>
                                        <li>
                                            <span id="totalVendidos">
                                                <p id="tituloStockVendidos">Total vendidos</p>
                                                <p id="cantidadProdVendidos">{{$offer->total_amount}}</p>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach

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

<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">
    $(window).on('load', function(){
        var buyerId;

        $("#sendcode").click(function(){

            let code = $("#inputCodigo").val();

            $('#sendcode').prop('disabled', true);

            axios.delete('{{route('otps.destroy', Auth::user()->id)}}', {params: {codigo: code}})
                .then(response => {

                    $("#infoCard").removeClass("d-none");;
                    $("#infoMessage").text(response.data.info);

                    if(response.data.success){
                        let id = response.data.offerId;
                        buyerId = response.data.buyerId;
                        $('#successCodeModal').modal('show');
                        $(`#offerDelivered-${id}`).text(parseInt($(`#offerDelivered-${id}`).text(), 10) + 1);
                        $(`#offerAmount-${id}`).text(parseInt($(`#offerAmount-${id}`).text(), 10) - 1);
                    }
                })
                .catch(error => {
                    console.log(error);
                    $('#infoCard').removeClass("d-none");;
                    $('#infoMessage').text("Hubo un error inesperado. Intenta de nuevo!");
                })
                .finally(() => $('#sendcode').prop('disabled', false));
        });

        $('#btnReportar').click(function(){
            if(!buyerId)
                return;

            $('#btnReportar').prop('disabled', true);

            axios.put(`/reportar-cliente/${buyerId}`)
                .then(response => {
                    console.log(response);
                    if(response.data.success)
                        $('#infoMessage').text("El usuario ya fue reportado. Muchas gracias.");
                    else
                        $('#infoMessage').text("Sucedio un problema al reportar al usuario. Disculpe las molestias.");
                })
                .catch(error => {
                    console.log(error);
                    $('#infoMessage').text("Sucedio un problema al reportar al usuario. Disculpe las molestias.");
                })
                .finally(() => {
                    $('#successCodeModal').modal('hide');
                    $('#btnReportar').prop('disabled', false);
                })


        });
    });
</script>
@endsection
