@extends('templates.dashboard')
@section('content')
<main class="w-full flex-grow p-6" x-data="{show: false}">
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Product List
        </p>
        <button @click="show=true" class="px-6 py-2 text-white bg-blue-600 rounded shadow-xl mb-4" type="button">Add
            Product</button>
        <div class="bg-white overflow-auto w-1/2">
                <div class="leading-loose">
                <form class="p-10 ">
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                            required="" placeholder="Your Name" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text"
                            required="" placeholder="Your Email" aria-label="Email">
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="message">Message</label>
                        <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="message" name="message" rows="6"
                            required="" placeholder="Your inquiry.." aria-label="Email"></textarea>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                            type="submit">Submit</button>
                    </div>
                </form>
            </div>
            </div>
    </div>

</main>
@endsection