<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Edit Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $product->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Main Image:</label>
                <div class="custom-file">
                    <input type="file" name="image" id="image" class="custom-file-input">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if ($product->main_image_path)
                    <img src="{{ asset('storage/' . $product->main_image_path) }}" alt="Product Image" class="img-fluid mt-2" style="max-width: 100px;">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

    <script>
        // Update custom-file-label text when choosing a file
        document.getElementById('image').addEventListener('change', function (e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>
@endsection
