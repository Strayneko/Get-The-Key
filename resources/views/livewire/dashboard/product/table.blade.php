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
                <th class="w-10 h-10 py-3 px-4 uppercase font-semibold text-sm">Image</th>
                <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Name</th>
                <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Price</th>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">Stock</th>
                <th class=" py-3 px-4 uppercase font-semibold text-sm">Option</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @if(count($products) > 0)
            @foreach($products as $product)
            <tr wire:key="{{ 'product-' . $product->id }}" class="text-center">
                <td class="w-1/7  py-3 px-4 text-center">{{ $loop->iteration }}</td>
                <td class="w-10 h-10  py-3 px-4"><img src="{{ asset('storage/' . $product->image) }}" alt=""></td>
                <td class="w-1/3  py-3 px-4">{{ $product->name }}</td>
                <td class=" py-3 px-4">{{ number_format($product->price) }}</td>
                <td class=" py-3 px-4">{{ number_format($product->stock) }}</td>
                <td class=" py-3 px-4">
                    <a href="" wire:click.prevent="deleteProduct({{ $product->id }})"
                        class="text-white bg-red-500 inline-block py-1 px-2 rounded hover:bg-red-700 focus:bg-red-700 hover:-translate-y-1 transition-transform hover:shadow-lg" wire:loading.attr="disabled">Delete</a>
                    <a href="{{ route('dashboard.product.edit', ['product_id' => $product->id]) }}"
                        class="text-white bg-green-500 inline-block py-1 px-2 rounded hover:bg-green-600 focus:bg-green-600 hover:-translate-y-1 transition-transform hover:shadow-lg">License List</a>
                    <a href="{{ route('dashboard.product.license', ['product_id' => $product->id]) }}"
                        class="text-white bg-yellow-500 inline-block py-1 px-2 rounded hover:bg-yellow-600 focus:bg-yellow-600 hover:-translate-y-1 transition-transform hover:shadow-lg">Edit</a>
                </td>
            </tr>
            @endforeach
            @elseif(count($products) == 0)
            <tr>
                <td class="w-10 h-10 py-3 px-4 text-center" colspan="6">No Data Found</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>