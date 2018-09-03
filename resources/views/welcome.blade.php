<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba Tecnica</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/welcome/app.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ url('/login') }}">Ingresar</a>
                        <a href="{{ url('/register') }}">Registrame</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Proyecto de Diego Ochoa
                </div>

                <div class="links">
                    <a href="{{ url('/graphic/random') }}">Grafico</a>
                </div>
            </div>
        </div>
    </body>
</html>
