<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.svg') }}">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="card p-3 mt-5 text-center">
                <div class="">
                    <h1>Qix Forum</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sint repudiandae odit atque? Dolore odit fugiat ducimus adipisci eveniet non debitis sapiente, corporis doloremque perspiciatis, illo nulla corrupti, architecto nesciunt?</p>
                </div>
                <hr>
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                            <a href="{{ route('discussions.index') }}" class="btn btn-outline-primary">View Discussions</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a>
                            <a href="{{ route('discussions.index') }}" class="btn btn-outline-primary">View Discussions</a>        
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
