<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts/navbar')
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>
@include('layouts/footer')

</html>