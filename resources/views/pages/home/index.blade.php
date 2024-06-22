@extends('layouts.main')

@push('styles')
    @livewireStyles()
@endpush

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
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('assets/img/mlbb-carousel.jpg') }}" class="d-block w-100" alt="Mobile Legends"
                        style="height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/img/valorant-carousel.jpeg') }}" class="d-block w-100" alt="Valorant"
                        style="height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/img/hsr-carousel.png') }}" class="d-block w-100" alt="Honkai: Star rail"
                        style="height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('assets/img/ww-carousel.jpeg') }}" class="d-block w-100" alt="Wuthering Waves"
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

        @livewire('product-content')
    </div>


    @include('components.footer')


    <!-- Scroll -->
    <div class="scroll">
        <a class="icon-scroll" href="#"><i class="fa fa-chevron-up fa-2x"></i></a>
    </div>
    <!-- Scroll End -->

    <!-- CS -->
<<<<<<< HEAD
    <div class="cs">
        <a class="icon-cs" href="#" target="_blank">
            <i class="fa fa-headset fa-2x"></i>
        </a>
    </div>
=======
    {{-- <div class="cs">
        <a class="icon-cs" href="#" target="_blank">
            <i class="fa fa-headset fa-2x"></i>
        </a>
    </div> --}}
>>>>>>> c045a14 (Update: Edit Something)
    <!-- CS End -->
@endsection

@push('scripts')
    @livewireScripts()
@endpush
