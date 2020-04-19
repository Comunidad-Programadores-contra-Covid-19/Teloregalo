<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Te lo regalo</title>
</head>
<body>
    <h1>Listado de comercios</h1>
        @foreach ($stores as $store)
            <div>
                <hr>
                <h3>Nombre: {{ $store->name}}</h2>
                <p>Descripcion: {{ $store->description}}</p>
            </div>
        @endforeach
</body>
</html>