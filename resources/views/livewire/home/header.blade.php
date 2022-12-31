<!-- header -->
<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <a href="{{ route('home.index') }}" class="text-2xl font-bold text-primary">
            <span>GetTheKey</span>
        </a>



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
            @if(empty($shop) && Auth::user()->role_id != 3)
           
            <a href="{{ route('home.openshop') }}" class="text-center text-gray-700 hover:text-primary transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-shop"></i>
                </div>
                <div class="text-xs leading-3">Open Shop</div>
            </a>
            @else
            <a href="{{ Auth::user()->role_id == 3 ? route('dashboard.transaction.index') : route('dashboard.product.index') }}" class="text-center text-gray-700 hover:text-primary transition relative">
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