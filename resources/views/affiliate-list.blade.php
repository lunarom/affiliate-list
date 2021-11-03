<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Affiliate List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->        
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center">
            <div class="main">
                <h3>Affiliates within 100KM of the Dublin Office</h3>
                <ul>
                    <li>
                        <p>Name</p>
                        <p>ID</p>
                    </li>
                    @foreach ($affiliates as $affiliate)
                        <li>
                            <p>{{ $affiliate->name }}</p> 
                            <p>{{ $affiliate->id }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </body>
</html>
