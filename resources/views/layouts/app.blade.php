<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Tambahkan jika ada file CSS -->
    <script src="{{ asset('js/script.js') }}" defer></script> <!-- Tambahkan jika ada file JS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>
<body> 
    <div>
    <div class="content">
        @yield('content')
    </div>
    </div>
</body>
</html>
