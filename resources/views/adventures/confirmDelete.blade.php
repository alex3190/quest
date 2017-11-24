@extends('navigation')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
                “Are you sure?"
            </div>
        </div>
    </div>
    {!! Form::open(['route' =>['adventures.confirmDelete', $adventure->id], 'method' => 'delete', 'class' =>"form-horizontal"]) !!}
    <div class="clearfix text-center">
        {!! Form::button('Cancel', ['class' =>'btn btn-sm btn-primary']) !!}
    </div>
    <div class="clearfix text-center">
        {!! Form::submit('Delete', ['class' =>'btn btn-sm btn-danger']) !!}
    </div>

    {!! Form::close()!!}}

@endsection