<!doctype html>
<head>
    <title>
        A quest to remember
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">A Quest To Remember</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li class="active"><a href="{{url('/news')}}">News</a></li>
                <li class="active"><a href="{{url('/about')}}">About us</a></li>
                <li class="active"><a href="{{url('/events')}}">Events</a></li>
                <li class="active"><a href="{{url('/gallery')}}">Gallery</a></li>
                <li class="active"><a href="{{url('/stories')}}">Stories and adventures</a></li>
                <li class="dropdown active">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Begin your adventure <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/events/create')}}">As a dungeon master</a></li>
                        <li><a href="{{url('/events/join')}}">As a player</a></li>
                    </ul>
                </li>
                <li class="dropdown active">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Games <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">D&D 5e</a></li>
                        <li><a href="#">Numenera</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
                <li class="dropdown active">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> My profile <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Campaigns</a></li>
                        <li><a href="#">Event history</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Profile details</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </div>
    </nav>
@yield('content')
</body>


