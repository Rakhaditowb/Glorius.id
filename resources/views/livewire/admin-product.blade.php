<div>
    <div class="actions mt-5 mb-4">
        <div class="search-box">
            <i class='bx bx-search'></i>
            <input class="ms-0 ps-2" type="search" id="search-product" placeholder="Search product..." autocomplete="off"  wire:model.live="search">
        </div>
        <a href="{{ route('product.create') }}" class="tambah-product">
            <i class='bx bx-plus fs-5'></i>
            <span class="text-size text-light">Tambah Product</span>
        </a>
    </div>

    @include('components.alert')

    <div class="products d-flex flex-column gap-2 pb-5">
        @forelse ($products as $item)
        <div class="content bg-card d-flex align-items-center justify-content-between">
            <div class="info d-flex align-items-center gap-3">
                <div class="image">
                    <img src="{{ asset('storage/images/'.$item->image) }}" alt="image">
                </div>
                <div class="description d-flex flex-column justify-content-center">
                    <h6 class="text-size text-light fw-semibold py-0 my-0">{{ $item->name }}</h6>
                    <p class="text-size fw-semibold py-0 my-0 {{ $item->status === 'Tersedia' ? 'text-success' : 'text-danger' }}">{{ $item->status }}</p>
                </div>
            </div>
            <div class="dropdown dropup me-4">
                <a href="#" id="dropdownMenuLink-{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-dots-vertical-rounded text-light fs-3'></i>
                </a>
            
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink-{{ $item->id }}">
                    <li><a class="dropdown-item" href="{{ route('product.edit', $item->slug) }}">Edit Product</a></li>
                    <li><a class="dropdown-item" href="{{ route('item.show', $item->slug) }}">Items</a></li>
                    <li><a class="dropdown-item pb-2" href="{{ route('payment.show', $item->slug) }}">Payment</a></li>
                    <hr class="text-secondary py-0 my-0 w-100">
                    <form id="delete-product-form-{{ $item->id }}" action="{{ route('product.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
    
                        <li>
                            <button type="button" class="dropdown-item text-danger pt-2" onclick="confirmDeleteProduct({{ $item->id }})">Hapus Product</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
            
        @empty
        <div class="error-message-container d-flex justify-content-center align-items-center py-5 w-100">
            <h4 class="text-light text-size">Tidak ada product.</h4>
        </div>
        @endforelse
    </div>
</div>
