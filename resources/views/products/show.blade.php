<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $product->title }}</h2>
        <p>{{ $product->description }}</p>

        @if ($product->main_image_path)
            <img src="{{ asset('storage/' . $product->main_image_path) }}" alt="Product Image" style="max-width: 100px;">
        @else
            <p>No image available</p>
        @endif

        <h3>Variants</h3>
        @forelse ($product->variants as $variant)
            <p>{{ $variant->size }} - {{ $variant->color }}</p>
        @empty
            <p>No variants available</p>
        @endforelse
    </div>
@endsection
