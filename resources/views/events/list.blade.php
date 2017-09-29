@extends('navigation')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 col-lg-8 col-lg-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Start your own game party!</div>
                    <div class="panel-body">
                        {!! Form::open(['route' =>['events.save'], 'method' => 'post', 'class' =>"form-horizontal"]) !!}
                        <div class="form-group">
                            {!! Form::label('game_type', 'Which game would you play?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::select('game_type', $gameTypes, 'dnd5e',  ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value' =>'game_type']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('max_nr_of_players', 'How many people do you want to play with?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::number('max_nr_of_players', '' , ['placeholder' => 'Max nr of players...', 'class' =>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('dungeon_master', 'Do you want to be the DM ?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::checkbox('dungeon_master', 'Dungeon Master', '') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('city', 'In which Romanian city would you like to play?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::text('city', '', ['placeholder' => 'City', 'class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="clearfix text-center">
                            {!! Form::submit('Save', ['class' =>'btn btn-sm btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
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
                            <td>Game #</td>
                            <td>Game type</td>
                            <td>Hosted by user</td>
                            <td>Max number of players</td>
                            <td>Free slots</td>
                            <td>Location</td>
                            <td>Created at</td>
                        </tr>
                        </thead>

                        @foreach($events as $event)
                            <tr>
                                <td>{{$event->id}}</td>
                                <td>{{$event->game_type}}</td>
                                <td>{{$event->dungeon_master_name}}</td>
                                <td>{{$event->max_nr_of_players}}</td>
                                {{--todo fix this to calculate available nr of players--}}
                                <td>{{0}}</td>
                                <td>{{$event->city}}</td>
                                <td>{{$event->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>    </div>
    </div>
@endsection



