<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" type="image/x-icon">

    {{-- tailwindcss main css --}}
    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="{{ asset('css/poppin.css') }}"
        rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    {{-- alphine js --}}
    <script defer src="{{ asset('js/alpine.cdn.min.js') }}"></script>
{{-- sweetalert 2 --}}
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    @livewireStyles
</head>

<body>
    
    {{-- header component --}}
    <livewire:home.header />
    {{-- navbar component --}}
    <livewire:home.navbar />
    
    @yield('content')
    <livewire:home.footer />
    <livewire:home.copyright />
    
    @livewireScripts

</body>

</html>