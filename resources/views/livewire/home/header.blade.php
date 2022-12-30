<!-- header -->
<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <a href="index.html">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" class="w-32">
        </a>

        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="search" id="search"
                class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                placeholder="search">
            <button
                class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition">Search</button>
        </div>

        @if(!Auth::guest())
        <div class="flex items-center space-x-4">
            <a href="{{ route('home.cart') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div class="text-xs leading-3">Cart</div>

            </a>
            <a href="{{ route('home.transaction_list') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
                <div class="text-xs leading-3">Transactions</div>

            </a>
            @if(empty($shop))
            <a href="{{ route('home.openshop') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-shop"></i>
                </div>
                <div class="text-xs leading-3">Open Shop</div>
            </a>
            @else
            <a href="{{ route('dashboard.product.index') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                   <i class="fa-solid fa-gauge"></i>
                </div>
                <div class="text-xs leading-3">Dashboard</div>
            </a>

            @endif
        </div>
        @else
        <h1 class="text-white">a</h1>
        @endif

    </div>
</header>
<!-- ./header -->