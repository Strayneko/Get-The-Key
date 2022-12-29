<main class="w-full flex-grow p-6" x-data="{show: false}">
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Add New Product
        </p>
        {{-- check if there is any errors send --}}
        @if($errors->any())
        {{-- initialize message variable --}}
        @php($message = '')
        {{-- loop trhough error messages --}}
        @foreach($errors->all() as $error)
        {{-- append every error to $message variable --}}
        @php($message .= "$error <br />")
        @endforeach
        {{-- show sweetalert --}}
        <div x-init="
                Swal.fire({
                icon: 'error',
                title: 'Error!',
                html: `{{ $message }}`
            })
            "></div>
        @endif

        <div class="bg-white overflow-auto w-1/2">
            <div class="leading-loose">
                <form class="p-10 " wire:submit.prevent="update" enctype="multipart/form-data">

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600">License Key</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" wire:model="license_key" type="text"
                            required="" placeholder="NAVB-I7SG-TICO-RVXG" aria-label="Name" autofocus>
                    </div>

                    <div class="mt-6">
                        <button
                            class="px-4 py-1 disabled:grayscale disabled:cursor-not-allowed text-white font-light tracking-wider bg-primary hover:bg-darkerPrimary hover:-translate-y-1 transition rounded"
                            type="submit">Submit</button>

                        <a href="{{ route('dashboard.product.license', ['product_id' => $product_id]) }}"
                            class="px-4 py-1 disabled:grayscale disabled:cursor-not-allowed text-white font-light tracking-wider bg-green-500 hover:bg-green-700 hover:-translate-y-1 transition rounded"
                            type="submit">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>