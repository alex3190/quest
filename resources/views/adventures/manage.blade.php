@extends('navigation')
@section('content')
</br>
<div class="text-center" id="news1" >
    <h4>
        Welcome, traveler. Your journey awaits!
    </h4>
</div>
</br>
<div class="text-center" id="news2">
    Here you can manage everything about your adventure! Edit details, kick suckers out, and have some fun!
    Don't go overboard though. Talk to your fellow adventurers before kicking them out. Always be courteous!
</div>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 col-lg-8 col-lg-offset-2">
            {!! Form::open(['route' =>['adventures.saveAdventure', $adventure->id], 'method' => 'patch', 'class' =>"form-horizontal"]) !!}

            <div class="form-group">
                {!! Form::label('game_type', 'Change the type of the game to be played', ['class' => 'col-md-5 col-lg-5']) !!}
                @if($adventure->game_type == \App\Adventure::GAME_DND_5E)
                    <div class="col-md-7 col-lg-7">
                        {!! Form::select('game_type', \App\Adventure::GAMES, \App\Adventure::GAME_DND_5E, ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value'=>$adventure->game_type]) !!}
                    </div>
                    @elseif($adventure->game_type == \App\Adventure::GAME_BOARD_ANY)
                    <div class="col-md-7 col-lg-7">
                        {!! Form::select('game_type', \App\Adventure::GAMES, \App\Adventure::GAME_BOARD_ANY, ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value'=>$adventure->game_type]) !!}
                    </div>
                    @elseif($adventure->game_type == \App\Adventure::GAME_DND_PATHFINDER)
                    <div class="col-md-7 col-lg-7">
                        {!! Form::select('game_type', \App\Adventure::GAMES, \App\Adventure::GAME_DND_PATHFINDER, ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value'=>$adventure->game_type]) !!}
                    </div>
                    @elseif($adventure->game_type == \App\Adventure::GAME_NUMENERA)
                    <div class="col-md-7 col-lg-7">
                        {!! Form::select('game_type', \App\Adventure::GAMES, \App\Adventure::GAME_NUMENERA, ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value'=>$adventure->game_type]) !!}
                    </div>

                @endif
            </div>
            <div class="form-group">
                {!! Form::label('city', 'In which city will you play?', ['class' => 'col-md-5 col-lg-5']) !!}
                <div class="col-md-7 col-lg-7">
                    {!! Form::text('city', $adventure->city, ['placeholder' => 'City where you will play', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('max_nr_of_players','How many players can participate except you?', ['class' => 'col-md-5 col-lg-5']) !!}
                <div class="col-md-7 col-lg-7">
                    {!! Form::number('max_nr_of_players', $adventure->max_nr_of_players, ['class' =>'form-control']) !!}
                </div>
            </div>
            <div class="clearfix text-center">
                {!! Form::submit('Save', ['class' =>'btn btn-sm btn-danger', 'id' => 'custom-button']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

    </br>
    </br>
    <div class="text-center" id="news2">
        We've gathered all the details about yourself, the applicants and participants to your adventure!
        You can review everything in the table below.
    </div>
    </br>
    </br>

    <table class="table table-condensed table-responsive">
        <tr>
            <th>Actions/Info</th>
            <th>Player name</th>
            <th>Availability</th>
            <th>Can we play at this adventurer's residence?</th>
            <th>Can he/she be dm?</th>
            <th>Prefferred playing location</th>
            <th>What can he/she bring?</th>
            <th>Previous tabletop experience</th>
            <th>Message for the creator</th>
            <th>Application status</th>

        </tr>
        </thead>

        <tbody>
        <tr>
            @foreach($attendees as $attendee)
                <td>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $attendee->user_id)

                        This is you!! You can't kick yourself out.

                    @elseif($attendee->application_status == 'accepted')

                        {!! Form::open(['route' => ["adventures.rejectApplicant", $adventure->id , $attendee->id],  'method'=>"post"]) !!}
                        {!! Form::submit('Uninvite', ['class' =>'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}

                    @elseif($attendee->application_status == 'not_reviewed')

                        {!! Form::open(['route' => ["adventures.approveApplicant", $adventure->id , $attendee->id],  'method'=>"post"]) !!}
                        {!! Form::submit('Approve', ['class' =>'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ["adventures.rejectApplicant",  $adventure->id , $attendee->id],  'method'=>"post"]) !!}
                        {!! Form::submit('Reject', ['class' =>'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}

                    @elseif($attendee->application_status == 'rejected')
                        {!! Form::open(['route' => ["adventures.resetApplicant",  $adventure->id, $attendee->id],  'method'=>"post"]) !!}
                        {!! Form::submit('I changed my mind', ['class' =>'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}

                    @endif
                </td>
                <td>{{$attendee->name}}</td>
                <td>{{$attendee->availability}}</td>
                <td>
                    @if($attendee->is_host == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    @if($attendee->is_dm == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    @if($attendee->place == NULL)
                        None
                    @else
                        {{$attendee->place}}
                    @endif
                </td>
                <td>
                    @if($attendee->inventory == NULL)
                        None
                    @else
                        {{$attendee->inventory}}
                    @endif
                </td>
                <td>
                    @if($attendee->experience_with_games == NULL)
                        None
                    @else
                        {{$attendee->experience_with_games}}
                    @endif
                </td>
                <td>
                    @if($attendee->message_to_creator == NULL)
                        None
                    @else
                        {{$attendee->message_to_creator}}
                    @endif
                </td>
                <td>{{ucfirst($attendee->application_status)}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>
<div class="clearfix text-center">
    <a href="{{url('adventures/'.$adventure->id.'/confirmDelete')}}" name="delete"
       class="btn btn-sm btn-danger" id="custom-button"> Delete Adventure</a>
</div>


@endsection