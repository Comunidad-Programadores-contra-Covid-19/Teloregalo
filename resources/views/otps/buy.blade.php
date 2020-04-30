@extends('layouts.app')
<?php   /* $user=Auth::user()->client */  ?>

@section('content')
<body>
    <div class="container">
        <div class="row">
            <h1>Gracias por cuidarnos!</h1>
            <p>Para poder retirar {regalo} presenta el siguiente codigo en el comercio</p>
        </div>
        <hr>
        <div class="row">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Codigo</div>
                <div class="card-body">
                    <h5 class="card-title"> {{ $otp->otp_pass}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
    </div>
    
</body>
@endsection