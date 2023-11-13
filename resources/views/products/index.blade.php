<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: lightblue;">
        
        <h2 class="mt-4 mb-4 text-black">Product List</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variants</th>
                        <th>Main Image</th>
                        <th>Actions</th> <!-- Add this column for edit and delete actions -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @foreach ($product->variants as $variant)
                                    <div class="variant">
                                        <div>
                                            <label class="font-weight-bold">Size:</label>
                                            <span>{{ $variant->size }}</span>
                                        </div>

                                        <div>
                                            <label class="font-weight-bold">Color:</label>
                                            <span>{{ $variant->color }}</span>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @if ($product->main_image_path)
                                    <img src="{{ url('storage/' . $product->main_image_path) }}" alt="Product Image" class="img-fluid" style="max-width: 100px;">
                                @else
                                    No image available
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No products available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
