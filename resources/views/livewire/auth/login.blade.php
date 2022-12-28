<!-- login -->
<div class="contain py-16">
    <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
        <h2 class="text-2xl uppercase font-medium mb-1">Login</h2>
        <p class="text-gray-600 mb-6 text-sm">
            welcome back customer
        </p>
        <form action="{{ route('auth.login') }}" method="post" autocomplete="off">
            @csrf
            <div class="space-y-2">
                <div>
                    <label for="email_login" class="text-gray-600 mb-2 block">Email address</label>
                    <input type="email"id="email_login" name="email_login"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="youremail.@domain.com">
                </div>
                <div>
                    <label for="password_login" class="text-gray-600 mb-2 block">Password</label>
                    <input type="password" id="password_login" name="password_login"
                        class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                        placeholder="*******">
                </div>
            </div>
            <div class="flex items-center justify-between mt-6">
                <a href="#" class="text-primary">Forgot password</a>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Login</button>
            </div>
        </form>

      

        <p class="mt-4 text-center text-gray-600">Don't have account? <button @click="register = true, login = false"
                class="text-primary focus:bg-primary/25 px-1 rounded">Register
                now</button></p>
    </div>
</div>
<!-- ./login -->