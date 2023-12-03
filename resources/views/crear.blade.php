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
    
    <div id="create">
        <form method="POST" action="{{ route('crear-producto') }}">
            @csrf
            <form-create-component></form-create-component>
            <button type="submit">Crear</button>
        </form>
    </div>

    <form action="{{ route('tabla-productos') }}">
        <button type="submit"> Volver</button>
    </form>
</body>
</html>