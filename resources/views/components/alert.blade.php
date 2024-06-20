@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible d-flex align-items-center gap-2" role="alert">
        <i class='bx bxs-check-circle text-success fs-4'></i>
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
