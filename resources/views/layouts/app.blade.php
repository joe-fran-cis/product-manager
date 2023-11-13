<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Product Management App</title>

    <!-- Include Bootstrap CSS (you might need to download it or use a CDN) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS styles here if needed -->
</head>
<body style="background-color:#d7d7ee;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#a5a5eb !important;">
        <a class="navbar-brand" href="{{ url('/') }}">Product App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
    <a class="nav-link btn btn-primary" style="background-color:#cfffff !important" href="{{ route('products.index') }}">Home</a>
</li>&nbsp;
<li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
    <a class="nav-link btn btn-primary" style="background-color:#cfffff !important" href="{{ route('products.create') }}">Add Product</a>
</li>

                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Include Bootstrap JS (you might need to download it or use a CDN) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
    <!-- Include your custom JS scripts here if needed -->
</body>
</html>
