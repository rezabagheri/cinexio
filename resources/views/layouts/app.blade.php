<!DOCTYPE html>
<html>
<head>
    <title>Cinexio</title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{ $slot }}
    @livewireScripts
</body>
</html>
