@extends('layouts.admin')

@section('content')
    <div class="container item py-3">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="title d-flex align-items-center gap-2">
                <a href="{{ route('product.index') }}" title="Back"><i class='bx bx-arrow-back text-opacity fs-3 mt-2 mt-lg-1'></i></a>
                <h2 class="text-size text-opacity text-center my-0 fs-2">Items</h2>
            </div>
            <a href="#" class="tambah-item" data-bs-toggle="modal" data-bs-target="#tambah-item">
                <i class='bx bx-plus fs-5'></i>
                <span class="text-size text-light my-0 py-0">Tambah Item</span>
            </a>
        </div>

        @include('components.alert')

        <div class="items d-flex flex-column gap-2 pb-5">
            @forelse ($items as $item)
            <div class="content bg-card d-flex align-items-center justify-content-between">
                <div class="info d-flex align-items-center gap-3">
                    <div class="image">
                        @if(!empty($item->image))
                            <img src="{{ asset('storage/images/'.$item->image) }}" alt="image">
                        @else
                            <img src="{{ asset('assets/img/logo.webp') }}" alt="image">
                        @endif
                    </div>
                    <div class="description d-flex flex-column justify-content-center gap-1">
                        <h6 class="text-size text-light py-0 my-0">{{ $item->name }}</h6>
                        <span class="text-size text-opacity py-0 my-0">Rp. {{ $item->price }}</span>
                    </div>
                </div>
                <div class="dropdown dropup me-4">
                    <a href="#" id="dropdownMenuLink-{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-dots-vertical-rounded text-light fs-3'></i>
                    </a>
                
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink-{{ $item->id }}">
                        <li>
                            <a class="dropdown-item" href="#" onclick="editItem('{{ $item->id }}', '{{ $item->product_id }}', '{{ $item->image }}', '{{ $item->name }}', '{{ $item->price }}')" data-bs-toggle="modal" data-bs-target="#edit-item">Edit Item</a>
                        </li>
                        <hr class="text-secondary py-0 my-0 w-100">
                        <form id="delete-item-form-{{ $item->id }}" action="{{ route('item.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
        
                            <li>
                                <button type="button" class="dropdown-item text-danger pt-2" onclick="confirmDeleteItem({{ $item->id }})">Hapus Item</button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
                
            @empty
            <div class="error-message-container d-flex justify-content-center align-items-center py-5 w-100">
                <h4 class="text-light text-size">Tidak ada item.</h4>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
        <!-- Tambah Item -->
        <div class="modal fade" id="tambah-item" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-body-dark">
                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-content">
                        <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                            <h5 class="modal-title" id="edit-profile-label">Tambah Item</h5>
                            <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                                <i class='bx bx-x text-light fs-2 icon'></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="image" class="mb-2">Upload image</label>
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .webp">

                            <label for="name" class="mb-2 mt-3">Name</label>
                            <input type="text" class="form-control text-light" id="name" name="name" placeholder="Masukkan nama itemnya" autocomplete="off" required>

                            <label for="price" class="mb-2 mt-3">Price</label>
                            <input type="number" class="form-control text-light" id="price" name="price" placeholder="Masukkan harga itemnya" autocomplete="off" required>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Tambah Item End -->

        <!-- Edit Item -->
        <div class="modal fade" id="edit-item" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-body-dark">
                <form id="edit-item-form" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="modal-content">
                        <input type="hidden" id="product_id" name="product_id">
                        <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                            <h5 class="modal-title" id="edit-profile-label">Edit Item</h5>
                            <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                                <i class='bx bx-x text-light fs-2 icon'></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="edit-upload-image-file" class="mb-2">Upload image</label>
                            <input type="file" class="form-control" id="edit-upload-image-file" name="image" accept=".jpg, .jpeg, .png, .webp">
    
                            <label for="edit-name" class="mb-2 mt-3">Name</label>
                            <input type="text" class="form-control text-light" id="edit-name" name="name" placeholder="Masukkan nama itemnya" required>
    
                            <label for="edit-price" class="mb-2 mt-3">Price</label>
                            <input type="number" class="form-control text-light" id="edit-price" name="price" placeholder="Masukkan harga itemnya" required>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit Item End -->
    <!-- Modal End -->
@endsection

@push('scripts')
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        function editItem(id, product_id, image, name, price) {        
            $('#product_id').val(product_id);
            $('#edit-upload-image-file').val('');
            $('#edit-name').val(name);
            $('#edit-price').val(price);

            $('#edit-item-form').attr('action', "{{ route('item.update', '') }}" + '/' + id);
            $('#edit-item').modal('show');
        }

        function confirmDeleteItem(id) {
            Swal.fire({
                icon: 'question',
                title: 'Anda Yakin?',
                text: 'Apakah Anda yakin ingin menghapus item ini?',
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
                    document.getElementById('delete-item-form-' + id).submit();
                }
            });
        }
    </script>
@endpush