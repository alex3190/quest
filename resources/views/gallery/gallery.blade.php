@extends('navigation')
@section('content')
    <section class="portfolio">
        <div class="container">
            <div class="row">

                <ul class="portfolio-sorting list-inline text-center">
                    <li><a href="#" data-group="all" class="active">All</a></li>
                    @foreach($uniqueTags as $tag)
                        <li><a href="#" data-group="{{$tag}}">{{$tag}}</a></li>
                    @endforeach
                </ul> <!--end portfolio sorting -->

                <ul class="portfolio-items list-unstyled" id="grid">


                    @for($i = 0; $i < count($tags); $i ++)
                        {{--{{dd($tags[$i])}}--}}
                                <li class="col-md-4 col-sm-4 col-xs-6" data-groups='{{"[" . $tags[$i] . "]"}}'>
                                    <figure class="portfolio-item">
                                        <a href="{{$csv[$i][1]}}">
                                            <img src="{{$csv[$i][2]}}" alt="{{$csv[$i][1]}}" class="img-responsive">
                                        </a>
                                    </figure>
                                @endfor
                                <!-- sizer -->
                        <li class="col-md-4 col-sm-4 col-xs-6 shuffle_sizer"></li>


                </ul> <!--end portfolio grid -->


            </div> <!--end row -->
        </div> <!-- end container-->
    </section>


@endsection
