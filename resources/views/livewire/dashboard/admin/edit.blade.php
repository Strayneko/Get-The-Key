<main class="w-full flex-grow p-6" x-data="{show: false}">
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Add New Admin
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
               <form  class="p-10"  wire:submit.prevent="update">
                   
                    <div class="space-y-2">
                        <div>
                            <label for="email" class="text-gray-600 mb-2 block">Email address</label>
                            <input type="email" wire:model="email" id="email"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="youremail.@domain.com">
                
                        </div>
                        <div>
                            <label for="password" class="text-gray-600 mb-2 block">Password</label>
                            <input type="password"  wire:model="password" id="password"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="*******">
                        </div>
                        <div>
                            <label for="name" class="text-gray-600 mb-2 block">Full Name</label>
                            <input type="text"  wire:model="name" id="name"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="fulan fulana">
                        </div>
                
                        <div>
                            <label for="phone_number" class="text-gray-600 mb-2 block">Phone Number</label>
                            <input type="number"  wire:model="phone_number" maxlength="13" 
                                placeholder="087836722420" id="phone_number"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                        </div>
                        <div>
                            <label for="birth_date" class="text-gray-600 mb-2 block">Birth Date</label>
                            <input type="date" wire:model="birth_date"
                                id="birth_date"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                        </div>
                        <div>
                            <label for="gender" class="text-gray-600 mb-2 block">Gender</label>
                            <select type="date"  wire:model="gender" id="gender"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                                <option value="">Select Gender</option>
                                <option value="0">Female</option>
                                <option value="1" >Male</option>
                            </select>
                        </div>
                
                        <div>
                            <label for="address" class="text-gray-600 mb-2 block">Adress</label>
                            <textarea type="text" wire:model="address" id="address"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"></textarea>
                        </div>
                
                    </div>
                    <div>
                         <label class="block text-sm text-gray-600">Picture</label>
                            <input
                                class="block w-full text-sm file:bg-primary file:outline-none file:border-none file:text-white file:py-2 file:px-2 file:hover:cursor-pointer text-primary-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" type="file" wire:model="picture">
                            </div>
                
                
                    <div class="mt-4">
                        <button type="submit" wire:loading.attr="disabled" wire:target="picture"
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary disabled:cursor-not-allowed disabled:grayscale transition uppercase font-roboto font-medium">edit admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>