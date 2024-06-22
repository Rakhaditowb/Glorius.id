@extends('layouts.main')

@push('styles')
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <div class="container transaksi py-3">
        <h2 class="text-size text-opacity mb-3">Transaksi</h2>

        @include('components.alert')

        <div class="table-responsive text-light pb-5">
            <table id="myDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Product</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                <div class="code">
                                    <h6 class="text-size fw-normal py-0 my-0 d-flex align-items-center gap-1">
                                        {{ $order->code }}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="username">
                                    <div class="username-info">
                                        <div class="avatar">
                                            <img src="{{ asset('storage/images/'.$order->product->image) }}" alt="">
                                        </div>
                                        <h6 class="text-light text-size fw-normal py-0 my-0">{{ $order->product->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="item">
                                    <h6 class="text-size fw-normal py-0 my-0 d-flex align-items-center gap-1" style="width: max-content;">
                                        {{ $order->item }}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="price">
                                    <h6 class="text-light text-size fw-normal py-0 my-0" style="width: max-content;">Rp. {{ $order->price }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="payment">
                                    <h6 class="text-light text-size fw-normal py-0 my-0">{{ $order->payment }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="status">
                                    <h6 class="text-light text-size fw-normal py-0 my-0">{{ $order->status }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="date">
                                    <h6 class="text-light text-size fw-normal py-0 my-0" style="width: max-content;">{{ $order->created_at->diffForHumans() }}</h6>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Datatables Js -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable();
        });
        $('#myDataTable').DataTable({
            "language": {
                "searchPlaceholder": "Cari transaksi..."
            }
        });
    </script>
@endpush