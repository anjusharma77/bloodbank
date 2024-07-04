<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Additional stylesheets or meta tags can be added here -->
</head>
<body>
    <div id="app">
        

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Additional scripts or JavaScript can be added here -->

    @yield('scripts') {{-- Yield section for additional scripts --}}
</body>
</html>
