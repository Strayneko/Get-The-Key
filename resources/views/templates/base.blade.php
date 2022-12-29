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
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    {{-- alphine js --}}
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
{{-- sweetalert 2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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