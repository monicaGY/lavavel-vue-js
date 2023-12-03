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
    
    <div id="producto">
        <productos-component></productos-component>
    </div>
    @if(isset($mensaje))
        <div style="color:red">{{ $mensaje }}</div>
    @endif
</body>
</html>