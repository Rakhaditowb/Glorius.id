@extends('layouts.admin')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container tambah-product py-3">
        <div class="title d-flex align-items-center gap-2 pb-3">
            <a href="{{ route('product.index') }}" title="Back"><i class='bx bx-arrow-back text-opacity fs-3 mt-2 mt-lg-1'></i></a>
            <h2 class="text-size text-opacity text-center my-0 fs-2">Edit Product</h2>
        </div>

        <form action="{{ route('product.update', $product->id) }}" method="POST" class="d-flex flex-column gap-2" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="card bg-card pb-3">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="card-title text-light text-size d-flex flex-wrap align-items-center gap-2 py-0 mt-0 mb-4">Assets</h3>
                    <div class="input-group">
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png, .webp">
                    </div>
                </div>
            </div>

            <div class="card bg-card pb-3">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="card-title text-light text-size d-flex flex-wrap align-items-center gap-2 py-0 mt-0 mb-4">Data</h3>
                    <label for="name" class="text-size text-opacity mb-2">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>

                    <label for="status" class="text-size text-opacity mt-3 mb-2">Status</label>
                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                        <option value="Tersedia" {{ $product->status === 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Habis" {{ $product->status === 'Habis' ? 'selected' : '' }}>Habis</option>
                    </select>

                    <div class="description w-100">
                        <label for="description" class="text-size text-opacity mt-3 mb-2">Description</label>
                        <textarea name="description" id="description" required>{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="card-footer w-100">
                    <button type="submit" class="btn btn-primary float-end text-light fw-medium">Edit Product</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 200,
                tabsize: 2,
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush