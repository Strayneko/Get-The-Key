<div>
<div x-init="@this.on('refreshTransactionTable', () => {
        Swal.fire(
        'Success!',
        `Transaction has been canceled!`,
        'success'
        )})"></div>
<table class="min-w-full bg-white" x-data>
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class=" py-3 px-4 uppercase font-semibold text-sm">#</th>
            <th class="w-10 h-10 py-3 px-4 uppercase font-semibold text-sm">Image</th>
            <th class="w-1/6  py-3 px-4 uppercase font-semibold text-sm">Status</th>
            <th class="w-1/4  py-3 px-4 uppercase font-semibold text-sm">Total</th>
            <th class=" py-3 px-4 uppercase font-semibold text-sm">Transaction date</th>
            <th class=" py-3 px-4 uppercase font-semibold text-sm">Paid date</th>
            <th class=" py-3 px-4 uppercase font-semibold text-sm">Option</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        @if(count($transactions) > 0)
        @foreach($transactions as $transaction)
        <tr wire:key="{{ 'transaction-' . $transaction->id }}" class="text-center">
            <td class="w-1/7  py-3 px-4 text-center">{{ $loop->iteration }}</td>
            <td class="w-10 h-10  py-3 px-4"><img src="{{ asset('storage/' . $transaction->receipt_image ?? '') }}" alt=""></td>
            <td class="w-1/6  py-3 px-4">
            @if($transaction->status == 0)
            <span class="text-yellow-500">Pending</span>
            @elseif($transaction->status == 1)
            <span class="text-orange-500">Verification</span>
            @elseif($transaction->status == 2)
            <span class="text-green-500">Complete</span>
            @else
            <span class="text-red-500">Rejected</span>
            @endif
            </td>
            <td class=" py-3 px-4">Rp{{ number_format($transaction->total) }}</td>
            <td class=" py-3 px-4">{{ $transaction->created_at }}</td>
            <td class=" py-3 px-4">{{ $transaction->paid_date ?? 'Unpaid' }}</td>
            <td class=" py-3 px-4">
                @if($transaction->status != 2)
                <a href="" @click.prevent="if(confirm('Are you sure?')) $wire.cancelTransaction({{ $transaction->id }})" 
                    class="text-white bg-red-500 inline-block py-1 px-2 rounded hover:bg-red-700 focus:bg-red-700 hover:-translate-y-1 transition-transform hover:shadow-lg"
                    wire:loading.attr="disabled">Cancel</a>
                @endif
                @if($transaction->status == 0 || $transaction->status == 3)
                <a href="{{ route('home.checkout', ['id' => $transaction->id]) }}"
                    class="text-white bg-green-500 inline-block py-1 px-2 rounded hover:bg-green-600 focus:bg-green-600 hover:-translate-y-1 transition-transform hover:shadow-lg">Pay</a>
                @endif
                @if($transaction->status == 2)
                <a href="{{ route('home.transaction_detail', ['transaction_id' => $transaction->id]) }}"
                    class="text-white bg-yellow-500 inline-block py-1 px-2 rounded hover:bg-yellow-600 focus:bg-yellow-600 hover:-translate-y-1 transition-transform hover:shadow-lg">Detail</a>
                    @endif
            </td>
        </tr>
        @endforeach
        @elseif(count($transactions) == 0)
        <tr>
            <td class="w-10 h-10 py-3 px-4 text-center" colspan="6">No Data Found</td>
        </tr>
        @endif
    </tbody>

</table>
</div>
