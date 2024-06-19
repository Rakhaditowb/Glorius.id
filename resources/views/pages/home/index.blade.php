@extends('layouts.main')

@section('content')
    <div class="container text-light">

        <!-- carousel images -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('assets/img/mlbb-carousel.png') }}" class="d-block w-100" alt="mobile legends image"
                        style="height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/img/pubgm-carousel.jpg') }}" class="d-block w-100" alt="PUBG Mobile"
                        style="height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/img/ff-carousel.jpg') }}" class="d-block w-100" alt="Free Fire"
                        style="height: 100%;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- end carousel images -->


        <!-- Search -->
        <form action="#" class="search my-5">
            <input class="search-input" type="search" placeholder="Search">
            <button class="search-btn" type="submit"><i class="fa fa-search" style="color: white;"></i></button>
        </form>
        <!-- Search End -->


        <h1 class="title-p mt-3" id="games">GAMES</h1>
        <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 g-2 g-lg-3">
            <a href="{{ route('detail') }}" class="col card h-100">
                <img src="{{ url('assets/img/mlbb-icon.jpg') }}" class="card-img-top" alt="MLBB Logo">
                <div class="card-body">
                    <h6 class="text-size text-light text-center">Mobile Legends</h6>
                </div>
            </a>
            <a class="col card h-100">
                <img src="{{ url('assets/img/mlbb-icon.jpg') }}" class="card-img-top" alt="MLBB Logo">
                <div class="card-body">
                    <h6 class="text-size text-light text-center">Mobile Legends</h6>
                </div>
            </a>
            <a class="col card h-100">
                <img src="{{ url('assets/img/mlbb-icon.jpg') }}" class="card-img-top" alt="MLBB Logo">
                <div class="card-body">
                    <h6 class="text-size text-light text-center">Mobile Legends</h6>
                </div>
            </a>
        </div>
    </div>


    @include('components.footer')


    <!-- Scroll -->
    <div class="scroll">
        <a class="icon-scroll" href="#"><i class="fa fa-chevron-up fa-2x"></i></a>
    </div>
    <!-- Scroll End -->

    <!-- CS -->
    <div class="cs">
        <a class="icon-cs" href="https://www.instagram.com/hikmalfalah231/" target="_blank">
            <i class="fa fa-headset fa-2x"></i>
        </a>
    </div>
    <!-- CS End -->
@endsection
