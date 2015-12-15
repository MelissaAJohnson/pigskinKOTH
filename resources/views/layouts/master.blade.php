<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'KOTH' --}}
        @yield('title','Pigskin KOTH')
    </title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Bootstrap CDN Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


    @yield('head')
</head>

<body>
    @if(\Session::has('flash_message'))
        <div class="alert alert-warning" role="alert">
            {{ \Session::get('flash_message') }}
        </div>
    @endif

    <header>
        <div class="container">
            @yield('top_nav')
            @if(Auth::check())
                <a href="/dashboard">
                    <h1>Pigskin King of the Hill</h1>
                </a>
            @else
                <a href="/">
                    <h1>Pigskin King of the Hill</h1>
                </a>
            @endif
        </div> 
    </header>

    <section>
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer>
        <div id = "footer">
            <div class="container text-center">
                <p class="muted credit">
                    <hr />
                    &copy; {{ date('Y') }} MJ Productions
                </p>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="/js/dropdown.js"></script>
    <script type="text/javascript" src="/js/collapse.js"></script>

    @yield('body')
</body>
</html>
