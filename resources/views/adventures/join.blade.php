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
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">About the adventure!</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>We will be playing...</td>
                                <td>In which city will the adventure be played?</td>
                                <td>How many seats are still open?</td>
                            </tr>

                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$adventure->game_type}}</td>
                                <td>{{$adventure->city}}</td>
                                <td>{{$spotsLeft}}</td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">About the participants</div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Who participates?</th>
                                @foreach($userNames as $userName)
                                    <th>{{$userName}}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Availability</th>
                                @foreach($availabilities as $isAvailable)
                                    <td>{{$isAvailable}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Can we play at this adventurer's residence?</th>
                                @foreach($attendees as $attendee)
                                    @if($attendee->is_host)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <th>Does this user have a preffered playing location?</th>
                                @foreach($attendees as $attendee)
                                    <td>{{$attendee->place}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Can he/she be dm?</th>
                                @foreach($dmOptions as $dmOption)
                                    @if($dmOption)
                                    <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                @endforeach
                            </tr>

                            <tr>
                                <th>What does he/she bring?</th>
                                @foreach($attendees as $attendee)
                                    <td>{{$attendee->inventory}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="panel panel-primary">
                    <div class="panel-heading">Join this party!</div>
                    <div class="panel-body">
                        {!! Form::open(['route' =>['adventures.join', $adventure->id], 'method' => 'post', 'class' =>"form-horizontal"]) !!}

                        <div class="form-group">
                            {!! Form::label('dungeon_master', 'Do you want to be the DM ?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::checkbox('dungeon_master', 'yes', '') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('host_of_adventure', 'Can the group play at your place?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::checkbox('host_of_adventure', 'yes', '') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('place', 'Do you want to play at a specific place (bar, etc?)', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('place', '', ['placeholder' => 'Place where you would like to play', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('inventory', 'Can you bring any props?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('inventory', '', ['placeholder' => 'Game books, dice, miniatures, etc...', 'class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('experience_with_games', 'Do you have experience with any kind of tabletop games?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('experience_with_games', '', ['placeholder' => 'What games, for how long?', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('availability', 'When will the signs foretell the beginning of your quests? When can you play?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::select('availability', $availability, 'anytime', ["class"=>"form-control input-md", "style"=>"text-transform: capitalize"]) !!}
                            </div>
                        </div>
                        <div class="clearfix text-center">
                            {!! Form::submit('Join this adventure now!', ['class' =>'btn btn-sm btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>




            </div>
        </div>
@endsection