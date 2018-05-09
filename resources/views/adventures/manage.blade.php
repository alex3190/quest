@extends('navigation')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
                “Welcome traveler, your journey awaits. Here you can manage everything about your adventure!"
            </div>
        </div>
    </div>
    {{--kick suckers out of your party--}}

    <div class="panel panel-primary">
        <div class="panel-heading">Edit the adventure details</div>
        <div class="panel-body">
            {!! Form::open(['route' =>['adventures.saveAdventure', $adventure->id], 'method' => 'patch', 'class' =>"form-horizontal"]) !!}

            <div class="form-group">
                {!! Form::label('game_type', 'Change the type of the game to be played', ['class' => 'col-md-5 col-lg-5']) !!}
                <div class="col-md-7 col-lg-7">
                    {!! Form::select('game_type', \App\Adventure::GAMES, $adventure->game_type, ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value' =>'game_type']) !!}
                </div>
            </div>
            {{--i don't feel like doing this shit now. creator changing postponed--}}
            {{--<div class="form-group">--}}
            {{--{!! Form::label('created_by', 'Change the adventure owner (WARNING you will lose your administrative rights!', ['class' => 'col-md-5 col-lg-5']) !!}--}}
            {{--<div class="col-md-7 col-lg-7">--}}
            {{--{!! Form::select('created_by', $attendeeNames, '', ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value' =>'created_by']) !!}--}}
            {{--</div>--}}
            {{--</div>--}}
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
                {!! Form::submit('Save', ['class' =>'btn btn-sm btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>


    <table class="table table-hover table-condensed table-responsive table-striped">
        <tr>
            <th>Player name</th>
            <th>Availability</th>
            <th>Can we play at this adventurer's residence?</th>
            <th>Can he/she be dm?</th>
            <th>Prefferred playing location</th>
            <th>What can he/she bring?</th>
            <th>Previous tabletop experience</th>
            <th>Message for the creator</th>
            <th>Application status</th>
            <th>Actions/Info</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            @foreach($attendees as $attendee)
                <td>{{$attendee->name}}</td>
                <td>{{$attendee->availability}}</td>
                <td>{{$attendee->is_host}}</td>
                <td>{{$attendee->is_dm}}</td>
                <td>{{$attendee->place}}</td>
                <td>{{$attendee->inventory}}</td>
                <td>{{$attendee->experience_with_games}}</td>
                <td>{{$attendee->message_to_creator}}</td>
                <td>{{$attendee->application_status}}</td>
                <td>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $attendee->user_id)

                        This is you!!

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
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="clearfix text-center">
        <a href="{{url('adventures/'.$adventure->id.'/confirmDelete')}}" name="delete"
           class="btn btn-sm btn-danger"> Delete Adventure</a>
    </div>


@endsection