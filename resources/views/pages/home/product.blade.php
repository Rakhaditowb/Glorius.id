@extends('layouts.main')

@section('content')
    <div class="container py-4" id="product">
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-3">
            <div class="col-lg-4 mt-2 mb-2">
                <div class="row-1">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ url('assets/img/mlbb-icon.jpg') }}" alt="mlbb topup"
                                    class="rounded bg-dark mx-auto mb-2 d-lg-block d-none" width="150">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="text-size text-light text-center py-0 my-0">Mobile Legends</h3>
                                        <div class="strip-primary"></div>
                                        <br>
                                        <span class="text-size text-color mt3 mb-3">Diamond Instant</span>
                                        <img src="{{ url('assets/img/mlbb-icon.jpg') }}" alt="mlbb topup"
                                            class="rounded bg-dark float-start mt-2 me-2 mb-0 d-lg-none d-block"
                                            width="45">
                                        <p class="text-size text-opacity">Top Up Diamond Mobile Legends</pc>
                                        <ol>
                                            <li>Masukkan <b>ID (SERVER)</b></li>
                                            <li>Pilih <b>Nominal</b> Diamond</li>
                                            <li>Pilih <b>Metode Pembayaran</b></li>
                                            <li>Tulis <b>Email </b>Anda</li>
                                            <li>Diamond masuk otomatis ke akun Anda.</li>
                                        </ol>
                                        <p style="text-align: center;">
                                            <font size="3" color="success"><b>Tersedia</b></font>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-2 mb-2">
                <form action="#">
                    <!-- Lengkapi Data -->
                    <div class="row-1">
                        <div class="col">
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <h5 class="text-size text-light">Lengkapi Data</h5>
                                </div>
                                <div class="card-body">
                                    <div id="userData">
                                        <div class="row row-cols row-cols-md">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="userId" class="text-size text-opacity">User ID</label>
                                                    <input class="form-control" placeholder="Masukkan User ID" type="id"
                                                        name="userId" id="userId" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="userId" class="text-size text-opacity">Server ID</label>
                                                    <input class="form-control" placeholder="Masukkan Server ID" type="id"
                                                        name="serverId" id="serverId" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Lengkapi Data End -->
    
                    <!-- Nominal -->
                    <div class="row-1 mt-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-size text-light">Pilih Nominal</h5>
                                </div>
                                <div class="card-body">
                                    <div id="tempatnominal">
                                        <div class="row row-cols-2">
                                            <div class="col-lg-4 mt-2 h-100">
                                                <div class="list-group">
                                                    <input type="radio" class="btn-check" name="price" id="success-outlined-1" autocomplete="off">
                                                    <label class="btn btn-outline-primary text-light" for="success-outlined-1">3 Diamonds</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-2 h-100">
                                                <div class="list-group">
                                                    <input type="radio" class="btn-check" name="price" id="success-outlined-2" autocomplete="off">
                                                    <label class="btn btn-outline-primary text-light" for="success-outlined-2">5 Diamonds</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-2 h-100">
                                                <div class="list-group">
                                                    <input type="radio" class="btn-check" name="price" id="success-outlined-3" autocomplete="off">
                                                    <label class="btn btn-outline-primary text-light"
                                                        for="success-outlined-3">11 Diamonds</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Nominal End -->
    
                    <!-- Metode Pembayaran -->
                    <div class="row-1 mt-3">
                        <div class="col">
                            <div class="card bg-dark">
                                <div class="card-header">
                                    <h5 class="text-size text-light">Pilih Metode Pembayaran</h5>
                                </div>
                                <div class="card-body">
                                    <div class="area-list-payment-method">
                                        <div class="child-box payment-drawwer">
                                            <div class="header short-payment-support-info-head"
                                                onclick="openPaymentDrawwer(this)">
                                                <p class="text-size text-opacity"><b>Virtual Account</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Metode Pembayaran End -->
    
                    <!-- Checkout -->
                    @guest
                    <div class="row-1 d-grid mt-3">
                        <a href="#" class="btn btn-primary text-light" onclick="Swal.fire({ icon: 'warning', title: 'Information', showCancelButton: true, confirmButtonText: 'Login', html: '<h6 class=\'text-size\'>Untuk melanjutkan, harap login terlebih dahulu!</h6>', customClass: { popup: 'sw-popup', title: 'sw-title', htmlContainer: 'sw-text', closeButton: 'sw-close', icon: 'sw-icon', confirmButton: 'sw-confirm', cancelButton: 'sw-cancel' }, }).then((result) => { if (result.isConfirmed) { window.location.href = '{{ route('login') }}'; } })">
                            Beli sekarang
                        </a>
                    </div>
                    @else
                    <div class="row-1 d-grid mt-3">
                        <button type="submit" class="btn btn-primary text-light">Beli sekarang</button>
                    </div>
                    @endguest
                    <!-- Checkout End -->
                </form>
            </div>
        </div>
    </div>
@endsection
