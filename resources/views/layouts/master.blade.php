<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'KOTH' --}}
        @yield('title','Pigskin KOTH')
    </title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

    @yield('head')
</head>

<nav>
   @if(\Session::has('flash_message'))
        <div class="alert alert-warning" role="alert">
            {{ \Session::get('flash_message') }}
        </div>
    @endif
    
    <div class="container">
        @if(Auth::check())
           <div class="navbar navbar-static-top">
                <div class="nav navbar-nav navbar-right">             
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn-large" data-toggle="dropdown" role="menu" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Account</a></li>
                            <li><a href="/logout">Sign Off</a></li>
                        </ul>
                    </li>     
                </div>
            </div>
        @else
           <div class="navbar navbar-static-top">
              <div class="navbar-inner">
                <div class="container">             
                    <ul class="nav pull-right">
                        <li>
                            <a href="/login">Login</a>
                        </li>
                    </ul>              
                </div>
              </div>
            </div>
        @endif
    </div>
</nav>

<body>

    <header>
        <div class="container">
            @yield('top_nav')
            <h1>Insert Logo Here</h1>
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
    <script src="public/bootstrap-collapse.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')
</body>
</html>
