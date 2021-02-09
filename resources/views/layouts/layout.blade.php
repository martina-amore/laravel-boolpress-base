<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Boolpress</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <header>
            <ul>
                @foreach(config('layout.routes') as $route)
                <li class={{ Route::currentRouteName() == $route['pathId'] ? 'active' : '' }}><a href="{{ route($route['pathId']) }}">{{$route['displayText']}}</a></li>
                @endforeach
            </ul>
        </header>

        @yield('content', 'Nessun contenuto disponibile')

    </body>
</html>
