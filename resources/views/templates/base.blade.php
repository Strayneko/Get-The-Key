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
</head>

<body>

         {{-- header component --}}
         <livewire:home.header />
        {{-- navbar component --}}
        <livewire:home.navbar />
        @yield('content')

        <!-- footer -->
            <footer class="bg-white pt-16 pb-12 border-t border-gray-100">
                <div class="container grid grid-cols-3">
                    <div class="col-span-1 space-y-8">
                        <img src="assets/images/logo.svg" alt="logo" class="w-30">
                        <div class="mr-2">
                            <p class="text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, hic?
                            </p>
                        </div>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-facebook-square"></i></a>
                            <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-instagram-square"></i></a>
                            <a href="#" class="text-gray-400 hover:text-gray-500"><i class="fa-brands fa-twitter-square"></i></a>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <i class="fa-brands fa-github-square"></i>
                            </a>
                        </div>
                    </div>
            
                    <div class="col-span-2 grid grid-cols-2 gap-8">
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                                </div>
                            </div>
            
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analitycs</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                                </div>
                            </div>
            
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                                <div class="mt-4 space-y-4">
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                                    <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- ./footer -->
            
            <!-- copyright -->
            <div class="bg-[#192a56] py-4">
                <div class="container flex items-center justify-between">
                    <p class="text-white">&copy; TailCommerce - All Right Reserved</p>
                    <div>
                        <img src="assets/images/methods.png" alt="methods" class="h-5">
                    </div>
                </div>
            </div>
            <!-- ./copyright -->
</body>

</html>