@extends('layouts.admin')

@section('content')
    <div class="container item py-3">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="title d-flex align-items-center gap-2">
                <a href="{{ route('product.index') }}" title="Back"><i class='bx bx-arrow-back text-opacity fs-3 mt-2 mt-lg-1'></i></a>
                <h2 class="text-size text-opacity text-center my-0 fs-2">Payment</h2>
            </div>
            <a href="#" class="tambah-item" data-bs-toggle="modal" data-bs-target="#tambah-payment">
                <i class='bx bx-plus fs-5'></i>
                <span class="text-size text-light my-0 py-0">Tambah Payment</span>
            </a>
        </div>

        @include('components.alert')

        <div class="items d-flex flex-column gap-2 pb-5">
            @forelse ($payments as $item)
            <div class="content bg-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="info d-flex flex-column gap-3 p-4">
                        <div class="payment-image">
                            <img src="{{ asset('storage/payments/'.$item->image) }}" alt="image">
                        </div>
                    </div>
                    <div class="dropdown dropup me-4">
                        <a href="#" id="dropdownMenuLink-{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-dots-vertical-rounded text-light fs-3'></i>
                        </a>
                    
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink-{{ $item->id }}">
                            <li>
                                <a class="dropdown-item" href="#" onclick="editPayment('{{ $item->id }}', '{{ $item->product_id }}', '{{ $item->type }}', '{{ $item->name }}', '{{ $item->image }}', '{{ $item->qr_image }}')" data-bs-toggle="modal" data-bs-target="#edit-payment">Edit Payment</a>
                            </li>
                            <hr class="text-secondary py-0 my-0 w-100">
                            <form id="delete-payment-form-{{ $item->id }}" action="{{ route('payment.destroy', $item->id) }}" method="POST">
                                @csrf @method('DELETE')
            
                                <li>
                                    <button type="button" class="dropdown-item text-danger pt-2" onclick="confirmDeletePayment({{ $item->id }})">Hapus Payment</button>
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>

                <div class="qr pb-4 pb-lg-5 d-flex justify-content-center">
                    <div class="qr-image">
                        <img src="{{ asset('storage/payments/'.$item->qr_image) }}" alt="qr image">
                    </div>
                </div>
            </div>
                
            @empty
            <div class="error-message-container d-flex justify-content-center align-items-center py-5 w-100">
                <h4 class="text-light text-size">Tidak ada payment.</h4>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
        <!-- Tambah Payment -->
        <div class="modal fade" id="tambah-payment" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-body-dark">
                <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-content">
                        <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                            <h5 class="modal-title" id="edit-profile-label">Tambah Payment</h5>
                            <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                                <i class='bx bx-x text-light fs-2 icon'></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="image" class="mb-2">Upload image</label>
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .webp" required>

                            <label for="qr_image" class="mt-3 mb-2">Upload qr image</label>
                            <input type="file" class="form-control" id="qr_image" name="qr_image" accept=".jpg, .jpeg, .png, .webp" required>

                            <label for="type" class="text-size text-opacity mt-3 mb-2">Type</label>
                            <select class="form-select" name="type" id="type" aria-label="Default select example">
                                <option value="qris">QRIS</option>
                                <option value="e-wallet">E - Wallet</option>
                            </select>

                            <label for="name" class="mb-2 mt-3">Name</label>
                            <input type="text" class="form-control text-light" id="name" name="name" placeholder="Masukkan nama paymentnya" autocomplete="off" required>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Tambah Payment End -->

        <!-- Edit Payment -->
        <div class="modal fade" id="edit-payment" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-body-dark">
                <form id="edit-payment-form" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="modal-content">
                        <input type="hidden" id="product_id" name="product_id">
                        <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                            <h5 class="modal-title" id="edit-profile-label">Edit Payment</h5>
                            <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                                <i class='bx bx-x text-light fs-2 icon'></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="edit-image" class="mb-2">Upload image</label>
                            <input type="file" class="form-control" id="edit-image" name="image" accept=".jpg, .jpeg, .png, .webp">

                            <label for="edit-qr_image" class="mt-3 mb-2">Upload qr image</label>
                            <input type="file" class="form-control" id="edit-qr_image" name="qr_image" accept=".jpg, .jpeg, .png, .webp">

                            <label for="edit-type" class="text-size text-opacity mt-3 mb-2">Type</label>
                            <select class="form-select" name="type" id="edit-type" aria-label="Default select example">
                                <option value="qris">QRIS</option>
                                <option value="e-wallet">E - Wallet</option>
                            </select>

                            <label for="edit-name" class="mb-2 mt-3">Name</label>
                            <input type="text" class="form-control text-light" id="edit-name" name="name" placeholder="Masukkan nama paymentnya" autocomplete="off" required>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit Payment End -->
    <!-- Modal End -->
@endsection

@push('scripts')
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        function editPayment(id, product_id, type, name, image, qr_image) {        
            $('#product_id').val(product_id);
            $('#edit-type').val(type);
            $('#edit-name').val(name);
            $('#edit-image').val('');
            $('#edit-qr_image').val('');

            $('#edit-payment-form').attr('action', "{{ route('payment.update', '') }}" + '/' + id);
            $('#edit-payment').modal('show');
        }

        function confirmDeletePayment(id) {
            Swal.fire({
                icon: 'question',
                title: 'Anda Yakin?',
                text: 'Apakah Anda yakin ingin menghapus payment ini?',
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
                    document.getElementById('delete-payment-form-' + id).submit();
                }
            });
        }
    </script>
@endpush