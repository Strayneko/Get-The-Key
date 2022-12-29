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
                        <label class="block text-sm text-gray-600" >Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  wire:model="name"
                            type="text" required="" placeholder="Your Name" aria-label="Name" autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >Price</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  wire:model="price"
                            type="number" required="" placeholder="Rp.">
                    </div>


                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >Max User</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  wire:model="max_user"
                            type="number" required="" placeholder="1">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >License Duration</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  wire:model="licensing_term"
                            type="text" required="" placeholder="30 days">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >Brand</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  wire:model="manufacture"
                            type="text" required="" placeholder="Microsoft">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >Description</label>
                        <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"  wire:model="description"
                            type="text" required=""></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >Category</label>
                        <select class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" wire:model="category_id"
                            type="text" required="">
                            <option value="0">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" wire:key="{{ 'category-'.$category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm text-gray-600" >Image</label>
                        <input class="block w-full text-sm file:bg-primary file:outline-none file:border-none file:text-white file:py-2 file:px-2 file:hover:cursor-pointer text-primary-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file" wire:model="image">
                    </div>

                    <div class="mt-6">
                        <button class="px-4 py-1 disabled:grayscale disabled:cursor-not-allowed text-white font-light tracking-wider bg-primary hover:bg-darkerPrimary hover:-translate-y-1 transition rounded"
                            type="submit">Save</button>

                        <a href="{{ route('dashboard.product.index') }}" class="px-4 py-1 disabled:grayscale disabled:cursor-not-allowed text-white font-light tracking-wider bg-green-500 hover:bg-green-700 hover:-translate-y-1 transition rounded"
                            type="submit">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>