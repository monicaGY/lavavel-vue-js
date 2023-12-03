<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/js/app.js'])

</head>
<body>
    @if(isset($mensaje))
        <h1>{{ $mensaje }}</h1>
    @endif
    <div id="edit" >
        <form method="POST" action="{{ route('editar-producto', ['id' => $producto->id]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $producto->id }}">

            <form-component :producto="{{ $producto }}"></form-component>
            <button type="submit">Editar</button>
        </form>
        <form action="{{ route('tabla-productos') }}">
            <button type="submit"> Volver</button>
        </form>
    </div>
    
</body>
</html>