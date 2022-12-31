<!-- navbar -->
    <nav class="bg-secondary">
        <div class="container flex">
            <div class="px-8 py-4 bg-primary flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fa-solid fa-bars"></i>
                </span>
  
            </div>
    
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize">
                    <a href="{{ route('home.index') }}" class="text-gray-200 hover:text-white transition">Home</a>
                </div>
                @if(Auth::guest())
                <a href="{{ route('auth.auth') }}" class="text-gray-200 hover:text-white transition">Login</a>
                @else
                <a href="{{ route('auth.logout') }}" class="text-gray-200 hover:text-white transition">Logout</a>
                @endif
            </div>
        </div>
    </nav>
    <!-- ./navbar -->