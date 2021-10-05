<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para {{isset($persona) ? 'Editar' : 'Crear'}} Personas</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(isset($persona))
        <form action="{{route('persona.update', $persona)}}" method="POST">
        @method('PATCH')
    @else
            <form action="{{ route('persona.store') }}" method="POST">
    @endif
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{$persona->nombre ?? ''}}">
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" name="apellido_paterno" value="{{$persona->apellido_paterno ?? ''}}">
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" name="apellido_materno" value="{{$persona->apellido_materno ?? ''}}">
        <br>
        <label for="identificador">Identificador:</label><br>
        <input type="text" name="identificador" value="{{$persona->identificador ?? ''}}">
        <br>
        <label for="telefono">Telefono:</label><br>
        <input type="text" name="telefono" id = "telefono" value="{{$persona->telefono ?? ''}}">
        <br>
        <label for="correo">Correo:</label><br>
        <input type="text" name="correo" id = "correo" value="{{$persona->correo ?? ''}}">
        <br>
        <input type= "submit" value="Enviar">

    </form>
</body>
</html>
