<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>

    <div id="app" class="tw-invisible lg:tw-visible">
        <x-flash-message />
        <div id="dekstop" class=" text-gray-900 tw-min-h-screen tw-bg-[#9F70FD] tw-py-10 ">
            @yield('content')
        </div>
    </div>
    <div id="mobile"
        class="tw-fixed tw-top-0 tw-left-0 tw-text-white tw-flex tw-bg-black tw-w-screen tw-h-screen tw-justify-center  lg:tw-invisible">
        <div class="tw-my-auto">
            <p>Hanya tersedia tampilan untuk dekstop !!!</p>
        </div>
    </div>
    
    @stack('scripts')
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tinggiDiv = document.getElementById('dekstop').clientHeight; // Ganti 'divId' dengan ID div Anda
            var tinggiLayar = window.innerHeight +'5rem';

            var divElement = document.getElementById('dekstop'); // Ganti 'divId' dengan ID div Anda
            divElement.classList.add(tinggiDiv < tinggiLayar ? 'tw-h-screen' : 'tw-h-100');
        });
    </script> --}}
</body>

</html>
