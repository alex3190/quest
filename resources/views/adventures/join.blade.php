@extends('navigation')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
                “Welcome traveler, your journey awaits. Here you can create a table to start your journey with friends and other adventurers. “
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 col-lg-8 col-lg-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">About the adventure!</div>
                    <div class="panel-body">

                       {{
                       $adventure
                       }}

                        {{$attendees}}

                </div>

            </div>
        </div>
    </div>
@endsection