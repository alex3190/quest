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
                    <div class="panel-heading">Start your own game party!</div>
                    <div class="panel-body">
                        {!! Form::open(['route' =>['adventures.save'], 'method' => 'post', 'class' =>"form-horizontal"]) !!}
                        <div class="form-group">
                            {!! Form::label('game_type', 'Which game would you play?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::select('game_type', $gameTypes, 'dnd5e',  ["class"=>"form-control input-md", "style"=>"text-transform: capitalize", 'value' =>'game_type']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('max_nr_of_players', 'How many souls will embark on this quest?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::number('max_nr_of_players', '' , ['placeholder' => 'Max nr of players...', 'class' =>'form-control']) !!}
                            </div>
                        </div>

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
                            {!! Form::label('city', 'In what city will the adventure start? ', ['class' => 'col-md-5 col-lg-5']) !!}
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
    @endsection