@extends('layouts.main', [
    'title' => 'Login',
    'active' => 'auth'
])

@push('styles')
    <link rel="stylesheet" href="{{ url('assets/css/auth.css') }}">
@endpush

@section('content')
    <div class="wrapper pt-4">
        <div class="container mt-5 mb-5">
            <div class="card login-form">
                <div class="card-body">
                    <h2 class="card-title text-center mb-3">Login</h2>

                    <!-- form login bs5 -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <div class="content mb-4">
                            <div class="pass-logo">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="Enter Email">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-login">Login</button>
                        </div>

                        <div class="mt-2">
                            <label>Not registered yet? 
                                <a href="{{ route('register') }}" class="text-primary">
                                    Create an account!
                                </a>
                            </label>
                        </div>
                    </form>
                    <!-- form login bs5 end -->
                </div>
            </div>
        </div>
    </div>
@endsection
