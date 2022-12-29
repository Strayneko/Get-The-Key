<!-- login -->
<div class="container py-16">

    <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
        <h2 class="text-2xl uppercase font-medium mb-1">Create an account</h2>
        <p class="text-gray-600 mb-6 text-sm">
            Register for new customer
        </p>
        
        <form method="post" enctype="multipart/form-data" action="{{ route('auth.registration') }}">
           @csrf
            <div class="space-y-2">
                <div>
                    <label for="email" class="text-gray-600 mb-2 block">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email"
                    class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                    placeholder="youremail.@domain.com" >
                    
                </div>
                <div>
                    <label for="password" class="text-gray-600 mb-2 block">Password</label>
                    <input type="password" name="password" id="password"
                    class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                    placeholder="*******" >
                </div>
                <div>
                    <label for="name" class="text-gray-600 mb-2 block">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                    class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="fulan fulana" >
                    </div>

                    <div>
                    <label for="phone_number" class="text-gray-600 mb-2 block">Phone Number</label>
                    <input type="number" value="{{ old('phone_number') }}" maxlength="13" name="phone_number" placeholder="087836722420" id="phone_number"
                    class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" >
                </div>
                <div>
                    <label for="birth_date" class="text-gray-600 mb-2 block">Birth Date</label>
                    <input type="date"  name="birth_date" value="{{ old("birth_date") }}" placeholder="087836722420" id="birth_date"
                    class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" >
                </div>
                <div>
                    <label for="gender" class="text-gray-600 mb-2 block">Gender</label>
                    <select type="date"  name="gender" placeholder="087836722420" id="gender"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                        <option value="0" @if(old('gender') == 0) selected @endif>Female</option>
                        <option value="1" @if(old('gender') == 1) selected @endif>Male</option>
                    </select>
                </div>

                <div>
                    <label for="address" class="text-gray-600 mb-2 block">Adress</label>
                    <textarea type="text"  name="address"id="address"
                    class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" >{{ old('address') }}</textarea>
                </div>

            </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                    <input
                    class="block w-full text-sm file:bg-primary file:outline-none file:border-none file:text-white file:py-3 file:px-2 file:hover:cursor-pointer text-primary-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file" name="picture" >
                </div>

                
                <div class="mt-4">
                <button type="submit"
                class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary disabled:cursor-not-allowed disabled:grayscale transition uppercase font-roboto font-medium">create
                account</button>
            </div>
        </form>


        <p class="mt-4 text-center text-gray-600">Already have account? <button @click="login = true, register = false"  class="text-primary focus:bg-primary/25 px-1 rounded">Login
            now</button></p>
    </div>

    
@error('name') <span class="error">{{ $message }}</span> @enderror
</div>

<!-- ./login -->