<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Link Fav Icon --}}
    <link rel="icon" href="{{ asset('novelnest.ico') }}" type="image/x-icon" />

    {{-- Link Font Google  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    {{-- Link Flowbite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])`


    <title>NovelNest</title>
</head>

<body class="dark:bg-gray-800">

    @include('partials.navbar')

    {{-- content custom --}}

    @yield('content')

    @include('partials.footer')


    {{-- Link CDN Jquey --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Link CDN Alternative Javescript Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
