@extends('navigation')
@section('content')
    <div class="text-center" id="news1" >
        <h4>
            Welcome, traveler. Your journey awaits!
        </h4>
    </div>
    <div class="text-center" id="news2">
        Alright, we get it. You didn't like any of the existing adventures. That's fine! We do love people that show initiative.
        Go on, then, create your own adventure! People will see it in the list and will apply to it.

        You can change most of the details in your own profile page later.
    </div>

    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 col-lg-8 col-lg-offset-2">

                {!! Form::open(['route' =>['adventures.save'], 'method' => 'post', 'class' =>"form-horizontal"]) !!}
                <div class="form-group">
                    {!! Form::label('game_type', 'In what world will you play?', ['class' => 'col-md-5 col-lg-5']) !!}
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
                    {!! Form::label('is_dm', 'Would you like to be the game master?', ['class' => 'col-md-5 col-lg-5', 'value' => 'is_dm', 'name' => 'is_dm']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::checkbox('is_dm', 'yes', false) !!} Yes
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('is_host', 'Can the group play at your place?', ['class' => 'col-md-5 col-lg-5', 'value' => 'is_host', 'name' => 'is_host']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::checkbox('is_host', 'yes', false) !!} Yes
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('place', 'Do you want to play at a specific place (bar, etc?)', ['class' => 'col-md-5 col-lg-5']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::text('place', '', ['placeholder' => 'Place where you would like to play', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('experience_with_games', 'What other quests have you embarked on?', ['class' => 'col-md-5 col-lg-5']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::text('experience_with_games', '', ['placeholder' => 'What games have you played and for how long?', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('inventory', 'Party inventory (what can you bring to this quest)?', ['class' => 'col-md-5 col-lg-5']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::text('inventory', '', ['placeholder' => 'Example: Game manual, dice, miniatures, combat grid, etc.', 'class' =>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'In what city will the adventure start? ', ['class' => 'col-md-5 col-lg-5']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::text('city', '', ['placeholder' => 'City', 'class' =>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('availability', 'When will the signs foretell the beginning of your quests? When can you play?', ['class' => 'col-md-5 col-lg-5']) !!}
                    <div class="col-md-7 col-lg-7">
                        {!! Form::select('availability', $availability, 'anytime', ["class"=>"form-control input-md", "style"=>"text-transform: capitalize"]) !!}
                    </div>
                </div>
                <div class="clearfix text-center">
                    {!! Form::submit('Save', ['class' =>'btn btn-md btn-danger', 'id' => 'custom-button']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection