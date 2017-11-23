@extends('navigation')
@section('content')

    <div class="row-fluid">
        <input class="filter__search js-shuffle-search" type="search" placeholder="Search..." />
    </div>
    <script>
        $(document).ready(function(){
            $("#hide").click(function(){
                $("div#allFilters").hide();
                $("a#show").show();

            });
            $("#show").click(function(){
                $("div#allFilters").show();
                $("a#show").hide();


            });
        });
    </script>
    <section class="portfolio">
        <div class="container">
            <div class="row">
                <div id="defaultShown">
                    <ul class="portfolio-sorting list-inline text-center">
                        <li><a href="#" data-group="all" class="active">All</a></li>
                        @for($i=0; $i<=11; $i++)
                            @if(isset($uniqueTags[$i]))
                            <li><a href="#" data-group="{{$uniqueTags[$i]}}">{{$uniqueTags[$i]}}</a></li>
                            @endif
                        @endfor
                        <a href="#" id="show"> See all filters... </a>
                    </ul> <!--end portfolio sorting -->
                </div>
                <div id="allFilters" style="display:none">
                    <ul class="portfolio-sorting list-inline text-center">
                        {{end($uniqueTags)}}
                        @for($i=12; $i<=key($uniqueTags); $i++)
                            @if(isset($uniqueTags[$i]))
                            <li><a href="#" data-group="{{$uniqueTags[$i]}}">{{$uniqueTags[$i]}}</a></li>
                            @endif
                        @endfor
                        <a href="#" id="hide"> Hide filters... </a>
                    </ul> <!--end portfolio sorting -->

                </div>




                <ul class="portfolio-items list-unstyled" id="grid">
                    @for($i = 0; $i < count($tags); $i ++)
                        {{--{{dd($tags[$i])}}--}}
                        <li class="col-md-4 col-sm-4 col-xs-6" data-groups='{{"[" . $tags[$i] . "]"}}'>
                            <figure class="portfolio-item picture-item__title">
                                <a href="{{$csv[$i][1]}}">
                                    <img src="{{$csv[$i][2]}}" alt="{{$csv[$i][1]}}" class="img-responsive">
                                </a>
                                <figcaption class="figure-caption text-right thumbnail with-caption">{{str_replace("\"", ' ', $tags[$i])}}</figcaption>
                            </figure>
                    @endfor
                    <li class="col-md-4 col-sm-4 col-xs-6 shuffle_sizer"></li>
                </ul> <!--end portfolio grid -->
            </div> <!--end row -->
        </div> <!-- end container-->
    </section>


@endsection
