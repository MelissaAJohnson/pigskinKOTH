<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'KOTH' --}}
        @yield('title','KOTH')
    </title>

    <meta charset='utf-8'>
    
</head>

<body>

    <header>
        {{-- This will be replaced with an image --}}
        <h1>Pigskin King of the Hill</h1>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }} Upside Down Studios, LLC
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
