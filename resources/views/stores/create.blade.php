<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Te lo regalo</title>
</head>
<body>
    <h1>Registro del comercio</h1>
    <form action=" {{ url('/stores') }}" method="post">
    @csrf
        <label for="">Nombre del comercio*</label>
        <input type="text" name="name">
        <br>
        <label for="">Email*</label>
        <input type="text">
        <br>
        <label for="">Contraseña</label>
        <input type="text">
        <br>
        <input type="submit" value="Registarse">
    </form>
    <hr>
    <button>Registrarse con Facebook</button>
    <button>Registrarse con Google</button>
</body>
</html>