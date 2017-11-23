<!doctype html>
<head>
    <title>
        A quest to remember
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shuffle.css') }}" rel="stylesheet">

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

    <footer>

        <!-- Include all compiled plugins (below), or include individual files as needed -->


        <div class="container">
            <div class="row">

                <div class="col-md-4 column">
                    <h4>AcasA Programming</h4>
                    <p>A tutorial by <a href="http://acasaprogramming.ro">AcasA Programming</a></p>
                    <ul class="social-icons list-inline">
                        <li><a href="https://www.youtube.com/channel/UCBGItdbB-5Yma5X6FK_hYBA" class="youtube"><span class="fa fa-youtube"></span></a></li>
                        <li><a href="https://www.facebook.com/acasaprogramming" class="facebook"><span class="fa fa fa-facebook"></span></a></li>
                        <li><a href="https://github.com/acasaprogramming" class="github"><span class="fa fa-github"></span></a></li>
                    </ul>

                </div>

                <script src="{{ asset('js/shuffle.min.js') }}"></script>
                <script src="{{ asset('js/shuffle_additional.js') }}"></script>
                <div class="col-md-4 column">
                    <h4>Credits</h4>
                    <ul class="list-unstyled">
                        <li><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="https://getbootstrap.com/">Bootstrap 3</a></li>
                        <li><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="https://vestride.github.io/Shuffle/">Shuffle.js</a></li>
                        <li><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="http://benalman.com/projects/jquery-throttle-debounce-plugin/" target="_blank">jQuery throttle / debounce</a></li>
                    </ul>
                </div>

                <div class="col-md-4 column">
                    <h4>Images by:</h4>
                    <ul class="list-unstyled">
                        <li><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="http://lorempixel.com/">Lorempixel</a></li>
                        <li><span class=" glyphicon glyphicon-chevron-right" aria-hidden="true"></span><a href="http://lorempicsum.com/">Lorempicsum</a></li>
                    </ul>
                </div>

            </div> <!--end row -->
        </div> <!-- end container-->
    </footer>
