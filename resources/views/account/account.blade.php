@extends('navigation')
@section('content')
    {{$id = Auth::user()->id}}
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    {{--</form>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Tell us about yourself!</div>
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::model(['url' => "/user/" . $id, 'method' => 'post'], ['class' =>"form-horizontal"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Which role would you like taking?') !!}
                            {!! Form::select('type', $userType, null,  ["class"=>"form-control input-md", "style"=>"text-transform: capitalize"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('When are you available to play?') !!}
                            {!! Form::select('availability', $availability, null, ["class"=>"form-control input-md", "style"=>"text-transform: capitalize"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Where do you live?') !!}
                            {!! Form::text('country', '', ['placeholder' => 'Country of residence', 'class' =>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('city', '', ['placeholder' => 'City of residence', 'class' =>'form-control']) !!}
                        </div>
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('Which games would you like to play?') !!}--}}
                            {{--{!! Form::text('game', '', ['placeholder' => 'Which games do you want to play?', 'class' =>'form-control']) !!}--}}
                        {{--</div>--}}
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

@endsection