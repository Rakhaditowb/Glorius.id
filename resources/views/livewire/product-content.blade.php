<div>
    <div class="search my-5">
        <input class="search-input" type="search" placeholder="Search" wire:model.live="search">
        <button class="search-btn" type="submit"><i class="fa fa-search" style="color: white;"></i></button>
    </div>

    <h1 class="title-p mt-3" id="games">GAMES</h1>
    <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-2 g-lg-3">
        @forelse ($products as $item)
        <a href="{{ route('detail', $item->slug) }}" class="col card h-100">
            <img src="{{ asset('storage/images/'.$item->image) }}" class="card-img-top" alt="image">
            <div class="card-body">
                <h6 class="text-size text-light text-center">{{ $item->name }}</h6>
            </div>
        </a>
            
        @empty
        <div class="error-message-container d-flex justify-content-center align-items-center py-5 w-100">
            <h4 class="text-light text-size">Tidak ada product.</h4>
        </div>
        @endforelse
    </div>
</div>
