@extends('templates.dashboard')
@section('content')
<div>

    <main class="w-full flex-grow p-6" x-data="{show: false}">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Category List
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                            <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Image</th>
                            <th class=" text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
        
                        @foreach($categories as $category)
                        <tr>
                            <td class="w-1/7 text-left py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="w-1/4 text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4">{{ $category->name }}</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                    href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </main>
</div>
@endsection