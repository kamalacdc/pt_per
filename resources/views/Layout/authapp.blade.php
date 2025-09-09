<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/SignUp_LogIn_Form.css') }}">
</head>
<body>
    

    <main>
        @yield('content')
    </main>

    {{-- @include('partials.footer') --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
<script src="{{ asset('js/SignUp_LogIn_Form.js') }}"></script>
</body>
</html>
