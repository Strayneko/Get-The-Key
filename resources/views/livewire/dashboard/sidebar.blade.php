<aside class="relative bg-primary h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ Auth::user()->role_id == 3 ? 'Admin' : 'Seller' }}</a>

    </div>
    <nav class="text-white text-base font-semibold pt-3">
        @can('seller')
        <a href="{{ route('dashboard.product.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Products
        </a>
        <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Market
        </a>
        @endcan
        @can('admin')
        <a href="{{ route('dashboard.transaction.index') }}"  class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
           <i class="far fa-credit-card mr-3"></i>
            Transaction List
        </a>
        <a href="{{ route('dashboard.category.index') }}"  class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Categories
        </a>
        <a href="{{ route('dashboard.admin.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-tablet-alt mr-3"></i>
            Admin
        </a>
        @endcan('admin')
        <a href="{{ route('home.index') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                   <i class="fas fa-backward mr-3"></i>
                    Back
                </a>
    </nav>
</aside>