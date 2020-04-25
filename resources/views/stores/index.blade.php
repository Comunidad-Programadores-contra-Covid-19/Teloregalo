@extends('layouts.app')
<?php $user=Auth::user()->store ?>

@section('content')
<body>
{{--     {{var_dump($stores)}} --}}
    <div class="container">
        <div class="row">
            <img src="https://lifeatbrio.com/wp-content/uploads/2016/11/user-placeholder.jpg" class="rounded mx-auto m-4 d-block col-2" >
        </div>
        
    </div>
    <nav class="container">
        <div class="nav nav-tabs row" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active col-4" id="nav-perfil-tab" data-toggle="tab" href="#nav-perfil" role="tab" aria-controls="nav-perfil" aria-selected="true">Perfil</a>
          <a class="nav-item nav-link col-4" id="nav-regalos-tab" data-toggle="tab" href="#nav-regalos" role="tab" aria-controls="nav-regalos" aria-selected="false">Regalos</a>
          <a class="nav-item nav-link col-4" id="nav-catalogo-tab" data-toggle="tab" href="#nav-catalogo" role="tab" aria-controls="nav-catalogo" aria-selected="false">Catalogos</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-perfil" role="tabpanel" aria-labelledby="nav-perfil-tab">
            @include('stores.profile')
            @yield('profile')
        </div>
        <div class="tab-pane fade" id="nav-regalos" role="tabpanel" aria-labelledby="nav-regalos-tab">
            @include('stores.gifts')
            @yield('gifts')
        </div>
        <div class="tab-pane fade" id="nav-catalogo" role="tabpanel" aria-labelledby="nav-catalogo-tab">
            @include('stores.catalogue')
            @yield('catalogue')
        </div>
      </div>
</body>
@endsection