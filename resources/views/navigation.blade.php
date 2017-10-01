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
                <li class="active"><a href="{{url('/about')}}">About us</a></li>
                <li class="active"><a href="{{url('/events')}}">Events</a></li>
                <li class="active"><a href="{{url('/tools')}}">Game aids</a></li>
                <li class="active"><a href="{{url('/campaigns')}}">Campaigns and stories</a></li>
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


