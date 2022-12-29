<main class="w-full flex-grow p-6" x-data="{show: false}">
    <livewire:subcomponents.alert.success />
    <h1 class="text-3xl text-black pb-6">Dashboard</h1>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Category List
        </p>
       <a href="{{ route('dashboard.category.create') }}"
            class="mb-2 py-1 px-2 bg-primary inline-block rounded text-white hover:-translate-y-1 transition hover:bg-darkerPrimary">Add
            Category</a>
        <div class="bg-white overflow-auto">
            <livewire:dashboard.category.table />
        </div>
    </div>


</main>