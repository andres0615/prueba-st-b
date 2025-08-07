<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mi App</title>
    <base href="/"> <!-- Importante para Angular routing -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(app()->environment('production'))
    <base href="/~usuario24/public/">
    @endif

    <!-- Scripts generados por Angular build -->
    @foreach(glob(public_path('app/browser/*.css')) as $file)
    <!-- validar si estamos en produccion -->
         @if(app()->environment('production'))
            <link rel="stylesheet" href="{{ secure_asset('app/browser/' . basename($file)) }}">
         @else
            <link rel="stylesheet" href="{{ asset('app/browser/' . basename($file)) }}">
         @endif
        
    @endforeach
</head>
<body>
    <app-root></app-root>
    
    <!-- Scripts generados por Angular build -->
    @foreach(glob(public_path('app/browser/polyfills*.js')) as $file)
        <!-- validar si estamos en produccion -->
         @if(app()->environment('production'))
            <!-- <script src="{{ secure_asset('app/browser/' . basename($file)) }}" type="module" ></script> -->
         @else
            <script src="{{ asset('app/browser/' . basename($file)) }}" type="module" ></script>
         @endif
    @endforeach

    @foreach(glob(public_path('app/browser/main*.js')) as $file)
        @if(app()->environment('production'))
            <!-- <script src="{{ secure_asset('app/browser/' . basename($file)) }}" type="module" ></script> -->
         @else
            <script src="{{ asset('app/browser/' . basename($file)) }}" type="module" ></script>
         @endif
    @endforeach

    <!-- <script src="{{ asset('app/browser/polyfills-FFHMD2TL.js')}}" type="module"></script>
    <script src="{{ asset('app/browser/main-SFWU5YO3.js') }}" type="module"></script> -->
</body>
</html>