<div>
    @if(session()->has('success'))
    <div x-init="Swal.fire(
                        'Success!',
                        `{{ session()->get('success') }}`,
                        'success'
                        )">
    </div>
    @endif
</div>