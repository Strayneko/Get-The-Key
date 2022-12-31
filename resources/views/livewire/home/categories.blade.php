<!-- categories -->
<div class="container py-16 ">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
   @if(count($categories) > 0)

   <div class="grid grid-cols-3 gap-3 w-1/2">
       @foreach($categories as $category)
        <div class="relative rounded-lg overflow-hidden group">
            <img src="{{ asset('storage/' . $category->image) }}" alt="category 1" class="w-full">
            <a href="#"
            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{ $category->name }}</a>
        </div>
        
        @endforeach
    </div>
</div>
   @else
   <h1 class="text-gray-600 text-2xl">No category available</h1>
   @endif
</div>
<!-- ./categories -->