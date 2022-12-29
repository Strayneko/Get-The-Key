<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get the Key Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .cta-btn {
            color: #3d68ff;
        }
    </style>
    <!-- AlpineJS -->
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    {{-- sweet alert --}}
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>

<body class="bg-gray-100 font-family-karla flex" x-data x-init="Alpine.store('page', {page: 'index'})">
    {{-- sidebar --}}
    <livewire:dashboard.sidebar />
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        {{-- navbar --}}
        <livewire:dashboard.navbar />
        
        <div class="w-full overflow-x-hidden border-t flex flex-col">

            @yield('content')
            
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>
        
    </div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</body>

</html>