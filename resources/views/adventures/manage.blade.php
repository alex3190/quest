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
    <div class="container-fluid clearfix">

        <a href="{{url('adventures/'.$adventure->id.'/confirmDelete')}}" name="delete" class="btn btn-sm btn-danger btn-block"> Delete Adventure</a>
        <a href="{{url('adventures/'.$adventure->id.'/applications')}}" name="applications" class="btn btn-sm btn-default btn-block"> Manage adventure applications</a>

    </div>

@endsection