@extends('layouts.admin')

@push('styles')
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <section class="container dashboard py-3">
        <h2 class="text-size text-opacity mb-3">Dashboard</h2>

        <div class="content pb-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
                <a href="#allUser" class="col text-decoration-none">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="info d-flex align-items-center gap-3">
                                <i class="fa-solid fa-users fs-4 text-light py-0 my-0"></i>
                                <div class="card-info d-flex flex-column justify-content-center gap-2">
                                    <h6 class="text-size text-opacity py-0 my-0">Total Users</h6>
                                    <p class="text-size text-color py-0 my-0">{{ $users->count() }}</p>
                                </div>
                            </div>
                            <div class="action text-size text-light fs-4">
                                <i class='bx bx-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('product.index') }}" class="col text-decoration-none">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="info d-flex align-items-center gap-3">
                                <i class="bx bxs-box fs-3 text-light py-0 my-0"></i>
                                <div class="card-info d-flex flex-column justify-content-center gap-2">
                                    <h6 class="text-size text-opacity py-0 my-0">Total Products</h6>
                                    <p class="text-size text-color py-0 my-0">{{ $products->count() }}</p>
                                </div>
                            </div>
                            <div class="action text-size text-light fs-4">
                                <i class='bx bx-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="col text-decoration-none">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="info d-flex align-items-center gap-3">
                                <i class="fa-solid fa-cart-shopping fs-4 text-light py-0 my-0"></i>
                                <div class="card-info d-flex flex-column justify-content-center gap-2">
                                    <h6 class="text-size text-opacity py-0 my-0">Total Orders</h6>
                                    <p class="text-size text-color py-0 my-0">120</p>
                                </div>
                            </div>
                            <div class="action text-size text-light fs-4">
                                <i class='bx bx-chevron-right'></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="action-user d-flex align-items-center justify-content-between mt-5 my-3">
                <h3 class="text-size text-opacity my-0 py-0" id="allUser">All Users</h3>
                <a href="#" class="tambah-user text-decoration-none d-flex align-items-center gap-2 bg-primary py-2 px-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#tambah-user-modal">
                    <i class='bx bx-plus text-light fs-5 my-0 py-0'></i>
                    <span class="text-size text-light my-0 py-0">Tambah User</span>
                </a>
            </div>

            @include('components.alert')

            <div class="table-responsive text-light pb-5">
                <table id="myDataTable" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                        <tr>
                            <td>
                                <div class="username">
                                    <div class="username-info">
                                        <div class="avatar">
                                            <img src="{{ 'https://ui-avatars.com/api/?background=random&name='. urlencode($item->name) }}" alt="">
                                        </div>
                                        <h6 class="text-light text-size fw-normal py-0 my-0">{{ $item->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="roles-info">
                                    <h6 class="text-size fw-normal py-0 my-0 d-flex align-items-center gap-1">
                                        {{ $item->roles }}
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="email-info">
                                    <h6 class="text-light text-size fw-normal py-0 my-0">{{ $item->email }}</h6>
                                </div>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="#" onclick="editUser('{{ $item->id }}', '{{ $item->roles }}', '{{ $item->name }}', '{{ $item->email }}')" data-bs-toggle="modal" data-bs-target="#edit-user-modal" title="Edit"><i class='bx bxs-pencil'></i></a>

                                    <form id="delete-user-form-{{ $item->id }}" action="{{ route('admin.user.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="hapus-btn" onclick="confirmDeleteUser({{ $item->id }})">
                                            <i class='bx bxs-trash-alt text-danger'></i>
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
    </section>

    <!-- Modal -->
        <!-- Modal Tambah User -->
        <div class="modal fade" id="tambah-user-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header mb-0 pb-0 border-0 d-flex align-items-center justify-content-between">
                            <h5 class="modal-title" id="tambah-user-label">Tambah User</h5>
                            <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                                <i class='bx bx-x text-light fs-2 icon'></i>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label for="roles-tambah" class="mb-2 mt-3">Roles</label>
                            <select id="roles-tambah" name="roles" class="form-select" aria-label="Default select example">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
    
                            <div class="error-message-container mb-2 mt-3">
                                <label for="username-tambah">Username</label>
                                <p class="text-danger fw-bolder py-0 my-0" id="error-message-tambah-username"></p>
                            </div>
                            <input type="text" class="form-control text-light" name="name" id="username-tambah" value="{{ old('name') }}" placeholder="Masukkan Username" autocomplete="off" required>
    
                            <label for="email-tambah" class="mb-2 mt-3">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror text-light" name="email" id="email-tambah" placeholder="Masukkan Email" autocomplete="off" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                            <div class="error-message-container mb-2 mt-3">
                                <label for="password-tambah">Password</label>
                                <p class="text-danger fw-bolder py-0 my-0" id="error-message-tambah-password"></p>
                            </div>
                            <div class="content-tambah-user" id="content-tambah-password">
                                <input type="password" class="form-control text-light" name="password" id="password-tambah" placeholder="Masukkan password" autocomplete="off" required>
                                <div class="pass-logo-pass" style="background-color: transparent;">
                                    <div class="showPass" id="showPassTambah" style="display: none;"><i class="fa-regular fa-eye-slash"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-primary px-4" id="tambah-user-btn">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Tambah User -->

        <!-- Modal Edit User -->
        <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-body-dark">
                <div class="modal-content">
                    <div class="modal-header mb-0 pb-0 border-0 d-flex align-items-center justify-content-between">
                        <h5 class="modal-title" id="edit-user-label">Edit User</h5>
                        <div class="close-btn" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                            <i class='bx bx-x text-light fs-2 icon'></i>
                        </div>
                    </div>
                    
                    <form id="edit-user-form" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="modal-body">
                            <figure class="profile d-flex flex-column justify-content-center align-items-center gap-3 mb-4">
                                <div class="foto-profile">
                                    <img id="edit-avatar" class="img img-avatar" src="">
                                </div>
                            </figure>
        
                            <div class="select-container d-flex align-items-center gap-2 w-100">
                                <div class="edit-roles-container w-100">
                                    <label for="edit-roles" class="mb-2 mt-3">Roles</label>
                                    <select id="edit-roles" name="roles" class="form-select" aria-label="Default select example">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
        
                            <div class="error-message-container mb-2 mt-3">
                                <label for="edit-name">Username</label>
                                <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-username"></p>
                            </div>
                            <input type="text" id="edit-name" class="form-control text-light" name="name" placeholder="Masukkan Username" autocomplete="off" required>
        
                            <div class="error-message-container mb-2 mt-3">
                                <label for="edit-email" class="">Email</label>
                                <p class="text-danger fw-bolder py-0 my-0" id="error-message-edit-email"></p>
                            </div>
                            <input type="email" id="edit-email" class="form-control text-light" name="email" placeholder="Masukkan Email" autocomplete="off" required>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="edit-user-btn" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
        <!-- Modal Edit User End -->
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
                "searchPlaceholder": "Search users..."
            }
        });


        function editUser(id, roles, name, email) {
            avatarUrl = "https://ui-avatars.com/api/?background=random&name=" + name;

            $('#edit-avatar').attr('src', avatarUrl);
            $('#edit-roles').val(roles);
            $('#edit-name').val(name);
            $('#edit-email').val(email);

            $('#edit-user-form').attr('action', "{{ route('admin.user.update', '') }}" + '/' + id);
            $('#edit-user-modal').modal('show');
        }

        function confirmDeleteUser(id) {
            Swal.fire({
                icon: 'question',
                title: 'Anda Yakin?',
                text: 'Apakah Anda yakin ingin menghapus akun ini?',
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
                    document.getElementById('delete-user-form-' + id).submit();
                }
            });
        }
    </script>
@endpush