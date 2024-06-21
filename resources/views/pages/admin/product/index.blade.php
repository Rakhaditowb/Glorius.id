@extends('layouts.admin')

@push('styles')
    @livewireStyles()
@endpush

@section('content')
    <section class="container product py-3">
        <h2 class="text-size text-opacity mb-3">Products</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
            <div class="col text-decoration-none">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="info d-flex align-items-center gap-3">
                            <i class="bx bxs-box fs-3 text-light py-0 my-0"></i>
                            <div class="card-info d-flex flex-column justify-content-center gap-2">
                                <h6 class="text-size text-opacity py-0 my-0">Total Product</h6>
                                <p class="text-size text-color py-0 my-0">{{ $products->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col text-decoration-none">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="info d-flex align-items-center gap-3">
                            <i class='bx bxs-check-circle fs-3 text-light py-0 my-0'></i>
                            <div class="card-info d-flex flex-column justify-content-center gap-2">
                                <h6 class="text-size text-opacity py-0 my-0">Tersedia</h6>
                                <p class="text-size text-color py-0 my-0">{{ $tersedia }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col text-decoration-none">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="info d-flex align-items-center gap-3">
                            <i class='bx bxs-minus-circle fs-3 text-light py-0 my-0'></i>
                            <div class="card-info d-flex flex-column justify-content-center gap-2">
                                <h6 class="text-size text-opacity py-0 my-0">Habis</h6>
                                <p class="text-size text-color py-0 my-0">{{ $habis }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewire('admin-product')
    </section>
@endsection

@push('scripts')
    @livewireScripts()

    <script>
        function confirmDeleteProduct(id) {
            Swal.fire({
                icon: 'question',
                title: 'Anda Yakin?',
                text: 'Apakah Anda yakin ingin menghapus product ini?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                customClass: {
                    popup: 'sw-popup',
                    title: 'sw-title',
                    htmlContainer: 'sw-text',
                    closeButton: 'sw-close',
                    icon: 'sw-icon',
                    confirmButton: 'sw-confirm',
                },
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-product-form-' + id).submit();
                }
            });
        }
    </script>
@endpush