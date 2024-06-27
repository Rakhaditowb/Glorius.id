@extends('layouts.admin')

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
                        <th>Username</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
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
                                            <img src="{{ asset('storage/images/' . $order->product->image) }}" alt="">
                                        </div>
                                        <h6 class="text-light text-size fw-normal py-0 my-0">{{ $order->product->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="username">
                                    <div class="username-info">
                                        <h6 class="text-light text-size fw-normal py-0 my-0">{{ $order->user->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="item">
                                    <h6 class="text-size fw-normal py-0 my-0 d-flex align-items-center gap-1" style="width: max-content;">
                                        {{ $order->item->name }}
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
                                <div class="bukti-pembayaran">
                                    <a href="#" onclick="buktiPembayaran('{{ $order->id }}', '{{ $order->bukti_pembayaran }}')" data-bs-toggle="modal" data-bs-target="#bukti-pembayaran-modal">Lihat</a>
                                </div>
                            </td>
                            <td>
                                <div class="date">
                                    <h6 class="text-light text-size fw-normal py-0 my-0" style="width: max-content;">{{ $order->created_at->diffForHumans() }}</h6>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="action d-flex justify-content-center gap-1">
                                    <a href="#" onclick="editTransaction('{{ $order->id }}', '{{ $order->status }}')" data-bs-toggle="modal" data-bs-target="#edit-transaction-modal" title="Edit">
                                        <i class='bx bxs-pencil'></i>
                                    </a>

                                    <form id="delete-transaction-form-{{ $order->id }}" action="{{ route('transaction.destroy', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="button" class="btn bg-trannsparant" onclick="confirmDeleteTransaction({{ $order->id }})" title="Hapus">
                                            <i class='bx bxs-trash text-danger'></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
        <!-- Modal Bukti Pembayaran -->
        <div class="modal fade" id="bukti-pembayaran-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="bukti-pembayaran" id="bukti-pembayaran" class="card-img">
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Bukti Pembayaran End -->

        <!-- Modal Edit Transaction -->
        <div class="modal fade" id="edit-transaction-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="edit-transaction-form" method="POST">
                    @csrf @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mt-0 pt-0">
                            <label for="edit-status" class="mb-2 mt-3">Status</label>
                            <select id="edit-status" name="status" class="form-select" aria-label="Default select example">
                                <option value="pending">pending</option>
                                <option value="success">success</option>
                            </select>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="simpan-edit-transaction-btn">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Edit Transaction End -->
    <!-- Modal End -->
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

        function buktiPembayaran(id, bukti_pembayaran) {
            bukti_pembayaran = '{{ asset('storage/payments') }}/' + bukti_pembayaran;

            $('#bukti-pembayaran').attr('src', bukti_pembayaran);
            $('#bukti-pembayaran-modal').modal('show');
        }

        function editTransaction(id, status) {
            $('#edit-status').val(status);

            $('#edit-transaction-form').attr('action', "{{ route('transaction.update', '') }}" + '/' + id);
            $('#edit-transaction-modal').modal('show');
        }

        function confirmDeleteTransaction(id) {
            Swal.fire({
                icon: 'question',
                title: 'Anda Yakin?',
                text: 'Apakah Anda yakin ingin menghapus transaksi ini?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                customClass: {
                    popup: 'sw-popup',
                    title: 'sw-title',
                    htmlContainer: 'sw-text',
                    closeButton: 'sw-close',
                    icon: 'sw-icon',
                    confirmButton: 'sw-confirm',
                },
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-transaction-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
