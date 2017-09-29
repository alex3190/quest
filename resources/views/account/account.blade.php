@extends('navigation')
@section('content')
    {{$id = Auth::user()->id}}
    {{--</form>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 col-lg-8 col-lg-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Tell us about yourself!</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => ["users.update", $id], 'method' => 'post', 'class' =>"form-horizontal"]) !!}
                        <div class="form-group">
                            {!! Form::label('type', 'Which role would you like taking?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                                {!! Form::select('type', $userType, 'dungeonMaster',  ["class"=>"form-control input-md", "style"=>"text-transform: capitalize"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('availability', 'When are you available to play?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                            {!! Form::select('availability', $availability, 'anytime', ["class"=>"form-control input-md", "style"=>"text-transform: capitalize"]) !!}
                                </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Where do you live?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                            {!! Form::text('country', '', ['placeholder' => 'Country of residence', 'class' =>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('city', 'Where do you live?', ['class' => 'col-md-5 col-lg-5']) !!}
                            <div class="col-md-7 col-lg-7">
                            {!! Form::text('city', '', ['placeholder' => 'City of residence', 'class' =>'form-control']) !!}
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