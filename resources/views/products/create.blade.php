<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Create Product</h2>

        <form id="createProductForm" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Main Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div id="variants-container">
                <div class="variant form-group">
                    <label for="size">Size:</label>
                    <input type="text" name="variants[0][size]" class="form-control" required>

                    <label for="color">Color:</label>
                    <input type="text" name="variants[0][color]" class="form-control" required>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between mb-2">
                <button type="button" class="btn btn-primary" onclick="addVariant()">Add Variant</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            var variantIndex = 1;
            var jq = jQuery.noConflict();

            function addVariant() {
                var variantsContainer = document.getElementById('variants-container');
                var newVariant = document.createElement('div');
                newVariant.className = 'variant form-group';
                newVariant.innerHTML = `
                    <label for="size">Size:</label>
                    <input type="text" name="variants[${variantIndex}][size]" class="form-control" required>

                    <label for="color">Color:</label>
                    <input type="text" name="variants[${variantIndex}][color]" class="form-control" required>
                `;
                variantsContainer.appendChild(newVariant);
                variantIndex++;
            }
        </script>
    </div>
@endsection
