<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href='/css/style.css'>
    <link rel="stylesheet" href=@yield('css')>
    <title>@yield('title')</title>
</head>

<body>
    <div class="container navbar mt-2">
        <img src="{{ asset('/images/ligachamp.png') }}" alt="" id="logo">
        <div class="nav">
            <ul class="d-flex gap-5">
                <li><a href="/">Beranda</a></li>
                <li><a href="/news">Berita</a></li>
                <li><a href="/">Skor</a></li>
                <li><a href="/">Jadwal</a></li>
                <li><a href="/highlight">Highlight</a></li>
                <li><a href="/">Info</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>

    @yield('content')

</body>

</html>
