@extends('layouts.main')

@section('content')
    <div class="container profile my-5">
        @include('components.alert')

        <div class="row row-cols-1 row-cols-lg-2 pb-5 g-3">
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-body d-flex flex-column gap-4 py-4">
                        <figure class="profile d-flex flex-column justify-content-center align-items-center gap-3">
                            <div class="foto-profile">
                                <img class="img" src="{{ 'https://ui-avatars.com/api/?background=random&name='. urlencode(Auth::user()->name) }}">
                            </div>
                            <figcaption class="text-light text-center fw-semibold w-75">{{ Auth::user()->name }}</figcaption>
                        </figure>

                        <div class="profile-details table-responsive">
                            <table class="table">
                                <tr>
                                    <td class="text-size">Username</td>
                                    <td class="text-size">:</td>
                                    <td class="text-size">{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-size">Email</td>
                                    <td class="text-size">:</td>
                                    <td class="text-size">{{ Auth::user()->email }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-8 d-flex flex-column gap-2">
                <div class="edit-profile py-4" data-bs-toggle="modal" data-bs-target="#edit-profile">
                    <a href="#" class="row d-flex justify-content-between text-decoration-none">
                        <div class="col d-flex align-items-center gap-3">
                            <i class='bx bxs-user text-light fs-2 icon'></i>
                            <h5 class="text-light text-size py-0 my-0">Edit profile</h5>
                        </div>
                    </a>
                </div>

                <a id="logout-confirmation" href="{{ route('logout') }}" class="logout text-decoration-none bg-danger py-4" onclick="event.preventDefault(); logout();">
                    <div class="row d-flex justify-content-between">
                        <div class="col d-flex align-items-center gap-3">
                            <i class='bx bx-arrow-from-left text-light fs-2 icon'></i>
                            <h5 class="text-light text-size py-0 my-0 fw-bold">Logout</h5>
                        </div>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
        <!-- modal edit profile -->
        <div class="modal fade" id="edit-profile" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-body-dark">
                <div class="modal-content bg-card">
                    <div class="modal-header border-0 d-flex align-items-center justify-content-between">
                        <h5 class="modal-title text-light" id="edit-profile-label">Edit profile</h5>
                        <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                            <i class='bx bx-x text-light fs-2 icon'></i>
                        </div>
                    </div>
                    
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="modal-body">
                            <figure class="profile d-flex flex-column justify-content-center align-items-center gap-3 mb-4">
                                <div class="foto-profile">
                                    <img class="img" src="{{ 'https://ui-avatars.com/api/?background=random&name='. urlencode(Auth::user()->name) }}" id="img-avatar">
                                </div>
                            </figure>
    
                            <div class="edit-username-error-message-container d-flex align-items-center gap-2 mb-2 mt-3">
                                <label for="edit-username" class="text-opacity">Username</label>
                                <p class="text-size text-danger fw-bolder py-0 my-0" id="edit-profile-error-message-username"></p>
                            </div>
                            <input type="text" class="form-control" name="name" id="edit-username" placeholder="Namanya jangan sara yaa" value="{{ Auth::user()->name }}" autocomplete="off" required>
                        </div>

                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary px-4" id="simpan-edit-profile-btn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal edit profile end -->
    <!-- Modal End -->

    @include('components.footer')
@endsection
