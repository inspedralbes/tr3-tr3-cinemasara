<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confimacion de Entradas</title>
</head>
<body>

    @foreach ($entradas as $entrada)
        <p>Entrada para la sesion {{$entrada['id_sesion']}} con el asiento {{$entrada['fila']}}{{$entrada['columna']}} y un precio de {{$entrada['preu']}}€</p>
    @endforeach
</body>
</html>

