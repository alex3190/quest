<!doctype html>
<head>
    <title>
        A quest to remember
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shuffle.css') }}" rel="stylesheet">
    <link href="{{asset('css/footer-distributed-with-address-and-phones.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body class="body">

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
            <li class="active"><a href="{{url('/about')}}">About us</a></li>
            {{--<li class="active"><a href="{{url('/events')}}">Events</a></li>--}}
            {{--<li class="active"><a href="{{url('/tools')}}">Game aids</a></li>--}}
            {{--<li class="active"><a href="{{url('/campaigns')}}">Campaigns and stories</a></li>--}}
            <li class="active"><a href="{{url('/gallery')}}">Gallery</a></li>
            <li class="dropdown active">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Adventures <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('/adventures')}}">Join an existing party</a></li>
                    <li><a href="{{url('/adventures/create')}}">Create a new party</a></li>
                </ul>
            </li>
            @if($isLoggedIn)
                <li class="dropdown active">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"> My profile <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/user/' . $user->id)}}">Profile details</a></li>
                        <li><a href="{{url('/user/' . $user->id . '/adventures')}}">My adventures</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if($isLoggedIn)
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        </ul>
    </div>
</nav>
@include('flash::message')
@yield('content')
</body>

<br>
<footer class="footer-distributed custom">
    <script src="{{ asset('js/shuffle.min.js') }}"></script>
    <script src="{{ asset('js/shuffle_additional.js') }}"></script>

    <div class="footer-left">
        <h3>A<span> quest</span> to remember</h3>
        <p class="footer-links">
            <a href="#">About Us</a>
            ·
            <a href="#">Adventures</a>
            ·
            <a href="#">Gallery</a>
            ·
            <a href="#">News</a>
            ·
            <a href="#">Contact</a>
        </p>
        <p class="footer-company-name">A Quest To Remember</p>
    </div>
    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Street address</span> Bucharest</p>
        </div>
        <div>
            <i class="fa fa-phone"></i>
            <p>+00000</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:alexandra.bulearca@gmail.com">alexandra.bulearca@gmail.com</a></p>
        </div>
    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>What?</span>
            You are the storyteller and story, the ink and the writer, the play and the audience, the master and the slayer of dragons.
        </p>
        <div class="footer-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

    </div>
</footer>
