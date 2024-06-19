<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light sticky-top">
    <div class="container">
        @guest()
        <a class="navbar-brand fs-4" href="{{ route('guest.index') }}">
            Glorius.id
        </a>
        @else
        <a class="navbar-brand fs-4" href="{{ route('index') }}">
            Glorius.id
        </a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest()
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('guest.index') }}">
                        <i class="fa-solid fa-house"></i>
                        &nbsp; Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'auth' ? 'active' : '' }}" href="">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        &nbsp; Login
                    </a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('index') }}">
                        <i class="fa-solid fa-house"></i>
                        &nbsp; Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'cek pesanan' ? 'active' : '' }}" href="">
                        <i class="fa-solid fa-cart-shopping"></i>
                        &nbsp; Cek Pesanan
                    </a>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</nav>
