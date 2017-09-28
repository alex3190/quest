@extends('navigation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Start your own game party!</div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::model(['url' => "/events/list", 'method' => 'post'], ['class' =>"form-horizontal"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Which game would you play?') !!}
                            {!! Form::select('game_type', $gameTypes, '',  ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value' =>'game_type']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('How many people do you want to play with?') !!}
                            {!! Form::number('max_nr_of_players', '' , ['placeholder' => 'Max nr of players...', 'class' =>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Do you want to be the DM ?') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::checkbox('dungeon_master', 'Dungeon Master', false) !!} Yes
                        </div>
                        <div class="form-group">
                            {!! Form::label('In which Romanian city would you like to play?') !!}
                            {!! Form::text('city', '', ['placeholder' => 'City', 'class' =>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save', ['class' =>'form-control btn btn-sm btn-primary']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
    <table class="table table-hover table-condensed">
        <thead>
        <tr>
            <td>Game</td>
            <td>Hosted by user</td>
            <td>Max number of players</td>
            <td>Free slots</td>
            <td>Location</td>
            <td>Created at</td>
        </tr>
        </thead>

        @foreach($events as $event)
<tr>
    <td>{{$event->gameType}}</td>
    <td>{{$event->dungeonMasterName}}</td>
    <td>{{$event->maxNrOfPlayers}}</td>
    {{--todo fix this to calculate available nr of players--}}
    <td>{{0}}</td>
    <td>{{$event->city}}</td>
    <td>{{$event->createdAt}}</td>
</tr>
        @endforeach
    </table>
    </div>
    </div>    </div>
    </div>
@endsection



