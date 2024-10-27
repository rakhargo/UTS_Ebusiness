<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DigiConsign</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:text-white/50">
        <div id="app">
            <carousel-component :images="['../images/panduan-keamanan.png', '../images/slideA2.jpg', '../images/slideA3.jpg']"></carousel-component>
        </div>
        <!-- <script src="{{ mix('js/app.js') }}"></script> -->
        <!-- <script type="module" src="{{ asset('resources/js/app.js') }}"></script> -->

    </body>
</html>