<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hace el pago!</h1>

    <form action={{ url('/procesar-pagos') }} method="POST">
        @csrf
        <script src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js" 
                data-public-key="TEST-e70c4f0d-35da-4ebe-9293-30c3457c2124" 
                data-transaction-amount="100.00">
        </script>
    </form>
</body>
</html>