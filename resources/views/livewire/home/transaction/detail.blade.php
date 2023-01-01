<div>
    
    @foreach($products as $product)
    <div class="bg-gray-300 p-6  md:mx-auto">
        <div class="bg-white p-6  md:mx-auto w-1/3">
            <div class="text-center">
                <img class="w-1/2 mx-auto mb-2" src="{{ asset('storage/' . $product->image) }}" alt="">
                <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">{{ $product->name }}</h3>
                <p class="text-gray-600 my-2">License Term = {{ $product->licensing_term }} Days</p>
                <p class="text-gray-600 my-2">Max User = {{ $product->max_user }} Users</p>
                <h2 class="text-slate-800 font-semibold text-xl mb-3">License Keys: </h2>
                @foreach($licenses->where('product_id', $product->id) as $license)
                <p>{{ $license->license_key }}</p>
                @endforeach
                <div class="py-10 text-center">
                    <a href="{{ route('home.index') }}" class="px-12 mx-3 bg-darkerPrimary hover:bg-darkerPrimary text-white font-semibold py-3">
                        GO BACK
                    </a>
                    <a href="{{ route('home.save_transaction', ['transaction_id' => $transaction->first()->id]) }}" class="px-12 bg-darkerPrimary hover:bg-darkerPrimary text-white font-semibold py-3">
                        Save To PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>