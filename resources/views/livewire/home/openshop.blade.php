<div class="container mt-16">
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
   <form method="post" enctype="multipart/form-data" wire:submit.prevent="submit" class="w-1/3 mx-auto">
                        <div class="space-y-2">
                <div>
                    <label for="email" class="text-gray-600 mb-2 block">Name</label>
                    <input type="text" 
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" wire:model="name"
                        placeholder="Shop Name">
                </div>
        
                <div>
                    <label for="address" class="text-gray-600 mb-2 block">Description</label>
                    <textarea type="text" name="address" id="address"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" wire:model="description"></textarea>
                </div>
                <div>
                    <label for="address" class="text-gray-600 mb-2 block">Adress</label>
                    <textarea type="text" name="address" id="address"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" wire:model="address"></textarea>
                </div>
        
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
                <input
                    class="block w-full text-sm file:bg-primary file:outline-none file:border-none file:text-white file:py-3 file:px-2 file:hover:cursor-pointer text-primary-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file"  wire:model="picture">
            </div>
        
        
            <div class="mt-4">
                <button wire:loading.attr="disabled" wire:target="picture" type="submit"
                    class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary disabled:cursor-not-allowed disabled:grayscale transition uppercase font-roboto font-medium">open
                    shop</button>
            </div>
        </form>
</div>
