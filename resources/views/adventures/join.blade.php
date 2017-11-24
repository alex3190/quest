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
                                <th>Beside his/her magnificent presence, what can he/she bring?</th>
                                @foreach($attendees as $attendee)
                                    <td>{{$attendee->inventory}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>What other quests has he/she you embarked on before?</th>
                                @foreach($attendees as $attendee)
                                    <td>{{$attendee->experience_with_games}}</td>
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
                            {!! Form::label('is_dm', 'Would you like to be the game master?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::checkbox('is_dm', false, false) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_host', 'Can the group play at your place?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::checkbox('is_host', false, false) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('place', 'Do you want to play at a specific place (bar, etc?)', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('place', '', ['placeholder' => 'Place where you would like to play', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('inventory','Party inventory (what can you bring to this quest)?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('inventory', '', ['placeholder' => 'Example: Game manual, dice, miniatures, combat grid, etc.', 'class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('experience_with_games', 'What other quests have you embarked on?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('experience_with_games', '', ['placeholder' => 'What games, for how long?', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('message_to_creator', 'Do you have a message to the group\'s creator?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('message_to_creator', '', ['placeholder' => 'What would you like to say?', 'class' => 'form-control']) !!}
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