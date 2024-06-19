@extends('layouts.main', [
    'title' => 'Login',
    'active' => 'auth',
])

@push('styles')
    <link rel="stylesheet" href="{{ url('assets/css/auth.css') }}">
@endpush

@section('content')
    <div class="wrapper pt-4">
        <div class="container mt-5 mb-5">
            <div class="card login-form" style="width: 400px;">
                <div class="card-body">
                    <h2 class="card-title text-center">Register</h2>

                    <!-- form registrasi bs5 -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <label for="name" class="form-label">Username</label>
                        <div class="content mb-3">
                            <div class="pass-logo">
                                <i class="fa fa-user"></i>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Enter Username">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label for="email" class="form-label">Email</label>
                        <div class="content mb-3">
                            <div class="pass-logo">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Enter Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label for="password" class="form-label">Password</label>
                        <div class="content mb-3">
                            <div class="pass-logo">
                                <i class="fa fa-lock"></i>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <div class="content mb-3">
                            <div class="pass-logo">
                                <i class="fa fa-lock"></i>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confim Password">
                        </div>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-login">Register</button>
                        </div>

                        <div class="mt-2">
                            <label>Have an account? <a href="{{ route('login') }}" class="text-primary">Login Here!</a></label>
                        </div>
                    </form>
                    <!-- form registrasi bs5 end -->

                </div>
            </div>
        </div>

    </div>
@endsection
