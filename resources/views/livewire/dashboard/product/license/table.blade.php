<div>
    <div x-init="@this.on('refreshTable', () => {
        Swal.fire(
        'Success!',
        `Data has been deleted!`,
        'success'
        )})"></div>
    <table class="min-w-full bg-white" x-data>
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">#</th>
                <th class="w-1/4 h-10 py-3 px-4 uppercase font-semibold text-sm">License Key</th>
                <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Status</th>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">Option</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @if(count($licenses) > 0)
            @foreach($licenses as $license)
            <tr wire:key="{{ 'license-' . $license->id }}" class="text-center">
                <td class="w-1/7  py-3 px-4 text-center">{{ $loop->iteration }}</td>
                <td class=" py-3 px-4">{{ $license->license_key }}</td>
                <td class=" py-3 px-4">{!! $license->status == 0 ? "<span class='text-red-500'>Sold</span>" : "<span class='text-green-500'>Available</span>" !!}</td>
                <td class=" py-3 px-4">
                    <a href="" wire:click.prevent="deleteLicense({{ $license->id }})"
                        class="text-white bg-red-500 inline-block py-1 px-2 rounded hover:bg-red-700 focus:bg-red-700 hover:-translate-y-1 transition-transform hover:shadow-lg"
                        wire:loading.attr="disabled">Delete</a>
                @if($license->status > 0)
                    <a href="{{ route('dashboard.product.license_edit', ['license_id' => $license->id]) }}"
                        class="text-white bg-yellow-500 inline-block py-1 px-2 rounded hover:bg-yellow-600 focus:bg-yellow-600 hover:-translate-y-1 transition-transform hover:shadow-lg">Edit</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @elseif(count($licenses) == 0)
            <tr>
                <td class="w-10 h-10 py-3 px-4 text-center" colspan="4">No Data Found</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>