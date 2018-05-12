<!doctype html>
<head>
    <title>
        A quest to remember
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shuffle.css') }}" rel="stylesheet">
    <link href="{{asset('css/footer-distributed-with-address-and-phones.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script>
        $(window).scroll(function() {
            if($(this).scrollTop() > 50)
            {
                $('.navbar-trans').addClass('afterscroll');
            } else
            {
                $('.navbar-trans').removeClass('afterscroll');
            }

        });
    </script>
</head>
<div id="holder" style="font-family: 'Trebuchet MS'">
    <body class="body">

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="panel panel-default container" id="mainPanel">
        <nav class="navbar navbar-inverse" id="main-navbar">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-item hidden-xs">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{url('/')}}"><strong>A quest to remember</strong></a></div>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle dropdown-menu-bg" href="#">Adventures <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/adventures')}}">Join an existing party</a></li>
                            <li><a href="{{url('/adventures/create')}}">Create a new party</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('/news')}}">News</a></li>
                    <li><a href="{{url('/useful-links')}}">Useful Links</a></li>
                    <li><a href="{{url('/gallery')}}">Gallery</a></li>
                    <li><a href="{{url('/about')}}">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    @if($isLoggedIn)
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle dropdown-menu-bg" href="#"> My profile <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/user/' . $user->id . '/adventures')}}">My adventures</a></li>
                            </ul>
                        </li>
                        <li class = "dropdown"><a href="{{ route('logout') }}">Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="flex-container-custom">


            @include('flash::message')
            @yield('content')
        </div>
    </div>
    </body>
</div>

<div class="footer-container">
    <footer class="footer-distributed custom img-responsive">
        <script src="{{ asset('js/shuffle.min.js') }}"></script>
        <script src="{{ asset('js/shuffle_additional.js') }}"></script>

        <div class="footer-left">
            <p>Created By...</p>
            <h2>A bunch of nerds
                <br>with too much spare time</h2>
            <p class="footer-links">
                <a href="{{url('/about')}}">About Us</a>
                ·
                <a href="{{url('/adventures')}}">Adventures</a>
                ·
                <a href="{{url('/gallery')}}">Gallery</a>
                ·
                <a href="{{url('/news')}}">News</a>
                ·
                <a href="{{url('/useful-links')}}">Useful Links</a>

            </p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Where do we live?</span> You don't want to know</p>
            </div>
            <br>
            <br>
            <br>
            <div>
                <i class="fa fa-envelope"></i>
                <p>
                    You can contact us at this address:
                    <br>
                    <a href="mailto:alexandra.bulearca@gmail.com">alexandra.bulearca@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>A bit of wisdom before you leave...</span>
                You are the storyteller and story, the ink and the writer, the play and the audience, the master and the slayer of dragons.
            </p>
            {{--<div class="footer-icons">--}}
            {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
            {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
            {{--<a href="#"><i class="fa fa-linkedin"></i></a>--}}
            {{--<a href="#"><i class="fa fa-github"></i></a>--}}

            {{--</div>--}}

        </div>
    </footer>
</div>

