<div>

    @if(session()->has('success'))
    <div x-init="Swal.fire(
                    'Success!',
                    `{{ session()->get('success') }}`,
                    'success'
                    )">
    </div>
    @endif
    <main class="w-full flex-grow p-6" x-data="{show: false}">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Transaction List
            </p>
            <div class="bg-white overflow-auto">
                <livewire:dashboard.transaction.table />
            </div>
        </div>


    </main>
</div>

