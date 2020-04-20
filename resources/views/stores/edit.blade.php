<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar Mi Comercio</h1>
    <form action=" {{ route('stores.update', $store->id) }}" method="POST">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <label for="name">{{'name'}}</label>
        <input type="text" name="name" id="name" value="{{ $store->name }}">

        <input type="submit" value="Editar">
        <a href="{{ url('/stores')}}">Cancelar</a>
    </form>
</body>
</html>