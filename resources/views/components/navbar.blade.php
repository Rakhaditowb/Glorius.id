<nav class="navbar navbar-expand-lg navbar-dark text-light sticky-top">
    <div class="container">
        @guest()
        <a class="navbar-brand fs-4 fw-semibold" href="{{ route('guest.index') }}">
            Glorius.<span class="text-primary">id</span>
        </a>
        @else
        <a class="navbar-brand fs-4 fw-semibold" href="{{ route('home') }}">
            Glorius.<span class="text-primary">id</span>
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
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'auth' ? 'active' : '' }}" href="{{ route('login') }}">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login
                    </a>
                </li>
            </ul>
            @else
                @if (Auth::user()->roles == 'user')
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                                <i class="fa-solid fa-house"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'cek pesanan' ? 'active' : '' }}" href="">
                                <i class="fa-solid fa-clipboard-list"></i>
                                Cek Pesanan
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mx-0 ms-auto my-1" id="dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-light" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="profile-image">
                                    <img class="img" src="{{ 'https://ui-avatars.com/api/?background=random&name='. urlencode(Auth::user()->name) }}">
                                </div>
                                <span class="nav-text text-light username-count">&nbsp;{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end"
                                aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}">My profile</a></li>
                                <li>
                                    <hr class="dropdown-divider-light py-0 my-1">
                                </li>
                                <li>
                                    <a id="logout-confirmaton" class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); logout();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                                <i class="fa-solid fa-house"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                                <i class='bx bxs-dashboard'></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'product' ? 'active' : '' }}" href="{{ route('product.index') }}">
                                <i class="bx bxs-box"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'cek pesanan' ? 'active' : '' }}" href="">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Orders
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mx-0 ms-auto my-1" id="dropdown">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-light" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="profile-image">
                                    <img class="img" src="{{ 'https://ui-avatars.com/api/?background=random&name='. urlencode(Auth::user()->name) }}">
                                </div>
                                <span class="nav-text text-light username-count">&nbsp;{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end"
                                aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}">My profile</a></li>
                                <li>
                                    <hr class="dropdown-divider-light py-0 my-1">
                                </li>
                                <li>
                                    <a id="logout-confirmaton" class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); logout();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            @endguest
        </div>
    </div>
</nav>


@push('scripts')
    <script>
        function logout() {
            Swal.fire({
                icon: 'question',
                title: 'Anda Yakin?',
                text: 'Apakah Anda yakin ingin logout?',
                showCancelButton: true,
                confirmButtonText: 'Logout',
                customClass: {
                    popup: 'sw-popup',
                    title: 'sw-title',
                    htmlContainer: 'sw-text',
                    icon: 'sw-icon',
                    closeButton: 'bg-secondary border-0 shadow-none',
                    confirmButton: 'bg-danger border-0 shadow-none',
                },
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
@endpush