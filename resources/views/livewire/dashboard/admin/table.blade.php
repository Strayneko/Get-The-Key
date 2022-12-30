<div>
    @if(session()->has('error'))
    <livewire:subcomponents.alert.error :message="session()->get('error')" />
    @endif
    @if(session()->has('success'))
    <livewire:subcomponents.alert.success :message="session()->get('success')" />
    @endif
    <table class="min-w-full bg-white" x-data>
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">#</th>
                <th class="w-10 h-10 py-3 px-4 uppercase font-semibold text-sm">Picture</th>
                <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Name</th>
                <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Email</th>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">Gender</th>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">Option</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @if(count($admins) > 0)
            @foreach($admins as $admin)
            <tr wire:key="{{ 'admin-' . $admin->id }}" class="text-center">
                <td class="w-1/7  py-3 px-4 text-center">{{ $loop->iteration }}</td>
                <td class="w-10 h-10  py-3 px-4"><img src="{{ asset('storage/' . $admin->picture) }}" alt=""></td>
                <td class="w-1/3  py-3 px-4">{{ $admin->name }} @if(Auth::user()->id == $admin->id) <span class="text-red-500">(Me)</span> @endif</td>
                <td class=" py-3 px-4">{{$admin->email }}</td>
                <td class=" py-3 px-4">{{$admin->gender == 0 ? 'Female' : 'Male' }}</td>
                <td class=" py-3 px-4">
                    <a href="" wire:click.prevent="deleteAdmin({{ $admin->id }})"
                        class="text-white bg-red-500 inline-block py-1 px-2 rounded hover:bg-red-700 focus:bg-red-700 hover:-translate-y-1 transition-transform hover:shadow-lg"
                        wire:loading.attr="disabled">Delete</a>
                    <a href="{{ route('dashboard.admin.edit', ['user_id' => $admin->id]) }}"
                        class="text-white bg-yellow-500 inline-block py-1 px-2 rounded hover:bg-yellow-600 focus:bg-yellow-600 hover:-translate-y-1 transition-transform hover:shadow-lg">Edit</a>
                </td>
            </tr>
            @endforeach
            @elseif(count($admins) == 0)
            <tr>
                <td class="w-10 h-10 py-3 px-4 text-center" colspan="6">No Data Found</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>