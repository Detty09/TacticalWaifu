<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Tactical Waifu')</title>

        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- Optional: Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

        <style>
            /* Autofill fix */
            input:-webkit-autofill {
                caret-color: white;
                box-shadow: inset 0 0 0 1000px transparent;
                -webkit-text-fill-color: #fff;
                transition: background-color 5000s ease-in-out 0s;
            }
        </style>
    </head>
    <body class="bg-[url('/images/pastelheartbg.jpg')] dark:bg-[url('/images/pastelheartbg.jpg')]  bg-cover bg-center
                bg-opacity-90 font-sans antialiased">
        <div class="w-full px-6 py-2 flex justify-center">

            <div class="w-full mt-6 px-4 py-8">
                @yield('content')
            </div>
        </div>
    </body>
</html>
