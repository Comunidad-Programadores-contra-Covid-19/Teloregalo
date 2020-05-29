<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TeLoRegalo</title>
</head>
<body>
<table style="max-width: 600px; padding: 10px; margin: 0 auto; border-collapse: collapse;">
    <tr>
        <td style="text-align: center;">
        <img style="max-width: 350px; height: auto" alt="Bienvenido" src="{{ $message->embed(public_path() . '/assets/comercio.png') }}" /> 
        </td>

    </tr>
    <tr>
        <td style="text-align: center;">
            <p style="font-family: Poppins Sans-serif,sans-serif; color: #96D293; font-weight: bold; font-size: 55px; margin: 5px;">
                Bienvenido {{$params->name}}</p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 40px; margin: 0;">¡Te estábamos
                esperando!</p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 19px; line-height: 36px; text-align: justify;
                color: #263238; padding: 10px;">Ahora los vecinos podrán comprar tus productos y beneficiar con un
                regalo a los trabajadores esenciales durante la pandemia.
                Para que la ayuda sea un éxito, te pedimos consideración a la hora de entregar el regalo a nuestros
                héroes; pidiendo por ejemplo el certificado de circulación.</p>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <a href="https://www.teloregalo.com.ar/store/{{$params->id}}" style="color:#2E2C2C; background-color: #96D293; border: 0.1rem solid;
        border-color: #96D293; border-radius: 1rem; padding: 0.3rem 1rem; font-weight: 400;
        text-align: center; font-family: Poppins Sans-serif,sans-serif; font-size: 18px;">Ir a mi perfil
            </a>
        </td>
    </tr>
    <tr style="margin-bottom: 100px">
        <td style="text-align: center;">
            <p style="font-family: Poppins Sans-serif,sans-serif; font-size: 23px;">El equipo de <b>teloregalo</b>
                {{-- <img style="max-width: 50px; height: auto; margin-left: 15px; margin-top: 15px;" alt="Logo Te lo regalo"
                     src=""/> --}}
            </p>
        </td>
    </tr>
</table>
</body>
</html>
