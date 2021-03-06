<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Personas!!!!</h1>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Codigo</th>
            <th>Correo</th>
            <th>Telefono</th>
        </thead>
        <tbody>
            @foreach ($personas as $persona )
                <tr>
                    <td>
                        <a href="{{route('persona.show',$persona->id)}}">
                             {{ $persona->id}}
                        <a>
                    </td>
                    <td>{{ $persona->nombre}}</td>
                    <td>{{ $persona->apellido_paterno}}</td>
                    <td>{{ $persona->apellido_materno}}</td>
                    <td>{{ $persona->identificador}}</td>
                    <td>{{ $persona->correo}}</td>
                    <td>{{ $persona->telefono}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
