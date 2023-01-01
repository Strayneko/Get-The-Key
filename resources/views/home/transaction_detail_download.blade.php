
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" type="image/x-icon">

    {{-- tailwindcss main css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
    integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" media="print" />

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

<div class="bg-gray-300 p-6  md:mx-auto">
<div>

    @foreach($products as $product)
    <div class="bg-gray-300 p-6  md:mx-auto">
        <div class="bg-white p-6  md:mx-auto w-1/3">
            <div class="text-center">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">{{ $product->name }}</h3>
                <p class="text-gray-600 my-2">License Term = {{ $product->licensing_term }} Days</p>
                <p class="text-gray-600 my-2">Max User = {{ $product->max_user }} Users</p>
                <h2 class="text-slate-800 font-semibold text-xl mb-3">License Keys: </h2>
                @foreach($licenses->where('product_id', $product->id) as $license)
                <p>{{ $license->license_key }}</p>
                @endforeach

            </div>
        </div>
    </div>
    @endforeach


</div>
    </div>

</body>

</html>