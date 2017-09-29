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

                       {{--{{$adventure}}--}}
{{----}}
                        {{--{{$attendees}}--}}

                        <table class="table">
                            <tbody>
                            <tr>
                                <th>We will be playing...</th>
                                <td>{{$adventure->game_type}}</td>
                            </tr>
                            <tr>
                                <th>Who participates?</th>
                                @foreach($userNames as $userName)
                                <td>{{$userName}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Availability of each user</th>
                                @foreach($availabilities as $availability)
                                <td>{{$availability}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Who can be the dm?</th>
                                @foreach($dmNames as $dmName)
                                    <td>{{$dmName}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>How many seats are still open?</th>
                                <td>MATHHHHH</td>
                            </tr>
                            <tr>
                                <th>What does the party have?</th>
                                @foreach($attendees as $attendee)
                                    <td>{{$attendee->inventory}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>In which city will the adventure be played?</th>
                                    <td>{{$adventure->city}}</td>
                            </tr>



                            </tbody>
                        </table>
                </div>

            </div>
        </div>
    </div>
@endsection