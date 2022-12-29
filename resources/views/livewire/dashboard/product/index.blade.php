<div>

<livewire:subcomponents.alert.success />

</div>
    <main class="w-full flex-grow p-6" x-data="{show: false}">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Product List
            </p>
            <a href="{{ route('dashboard.product.create') }}"
                class="mb-2 py-1 px-2 bg-primary inline-block rounded text-white hover:-translate-y-1 transition hover:bg-darkerPrimary">Add
                Product</a>
            <div class="bg-white overflow-auto">
            <livewire:dashboard.product.table />
            </div>
        </div>


    </main>
</div>
