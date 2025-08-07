<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mi App</title>
    <base href="/"> <!-- Importante para Angular routing -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts generados por Angular build -->
    @foreach(glob(public_path('app/browser/*.css')) as $file)
        <link rel="stylesheet" href="{{ asset('app/browser/' . basename($file)) }}">
    @endforeach
</head>
<body>
    <app-root></app-root>
    
    <!-- Scripts generados por Angular build -->
    @foreach(glob(public_path('app/browser/polyfills*.js')) as $file)
        <script src="{{ asset('app/browser/' . basename($file)) }}" type="module" ></script>
    @endforeach

    @foreach(glob(public_path('app/browser/main*.js')) as $file)
        <script src="{{ asset('app/browser/' . basename($file)) }}" type="module" ></script>
    @endforeach

    <!-- <script src="{{ asset('app/browser/polyfills-FFHMD2TL.js')}}" type="module"></script>
    <script src="{{ asset('app/browser/main-SFWU5YO3.js') }}" type="module"></script> -->
</body>
</html>