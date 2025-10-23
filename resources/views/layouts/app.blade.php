<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <header>
        @include('partials.header') <!-- Thêm header -->
    </header>

    <main>
        <!--@yield('content')-->
    </main>

    <footer>
      @include('partials.footer')  <!-- Thêm footer --> 
    </footer>
</body>
</html>

<!-- DAT HANG+XU LY DON HANG -->