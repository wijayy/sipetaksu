@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }} | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('asset/logo susut.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-black font-mulish">
    <div class="flex flex-col items-center min-h-screen sm:justify-center">
        <div class="w-full min-h-screen overflow-hidden shadow-md">
            <div class="flex flex-col items-center justify-center lg:flex-row">
                <div class="relative w-full bg-right bg-no-repeat bg-cover h-52 lg:h-screen lg:w-7/12 xl:w-2/3"
                style="background-image: url({{ asset('asset/guest.png') }})">
                <div
                    class="absolute top-0 left-0 flex items-center justify-center w-full h-full text-center text-white ">
                    <div class="w-11/12 text-2xl lg:text-4xl lg:w-3/4 xl:w-1/2 lg:text-start">Kembangkan Potensi UMKM
                        Susut,
                        Majukan
                        Ekonomi Desa!</div>
                </div>
            </div>

            {{ $slot }}
        </div>
    </div>
    </div>
</body>

</html>
