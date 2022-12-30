
<div>
    <div x-init="@this.on('refreshTransactionTable', () => {
        Swal.fire(
        'Success!',
        `Transaction has been canceled!`,
        'success'
        )})"></div>

        <main class="w-full flex-grow p-6" x-data="{show: false}">
                <h1 class="text-3xl text-black pb-6">Dashboard</h1>
            
                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Transaction Detail
                    </p>
                    <div class="bg-white overflow-auto w-1/3">
               
                        <div class=" bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                               
                                <img class="rounded-t-lg" src="{{ asset('storage/'. $transaction->receipt_image) }}" alt="" />
                            </a>
                            <div class="p-5">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                Transaction Date : {{ $transaction->created_at }}    
                                </p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                Paid Date : {{ $transaction->paid_date }}    
                                </p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Total Payment: Rp{{ number_format($transaction->total) }}
                                </p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Status: 
                                    @if($transaction->status == 0)
                                    <span class="text-yellow-500">Pending</span>
                                    @elseif($transaction->status == 1)
                                    <span class="text-orange-500">Verification</span>
                                    @elseif($transaction->status == 2)
                                    <span class="text-green-500">Complete</span>
                                    @else
                                    <span class="text-red-500">Rejected</span>
                                    @endif
                                </p>

                                <a href="{{ route('dashboard.transaction.index') }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   Back
                                </a>
                                @if($transaction->status == 1)
                                <a href="#" x-on:click.prevent="if(confirm('Are you sure?')) $wire.approveTransaction({{ $transaction->id }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                   Approve
                                </a>
                                <a href="#" x-on:click.prevent="if(confirm('Are you sure?')) $wire.rejectTransaction({{ $transaction->id }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                   Reject
                                </a>
                                @endif
                            </div>
                        </div>


            </div>
                </div>
            
            
            </main>

</div>


