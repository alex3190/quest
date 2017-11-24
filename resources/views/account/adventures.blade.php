@extends('navigation')
@section('content')
    <div class="panel panel-default col-md-12">
    <table class="table table-hover table-condensed table-inverse">
        <thead>
        <tr>
            <td>#</td>
            <td>Game type</td>
            <td>Created by</td>
            {{--<td>Max number of players</td>--}}
            <td>Free slots</td>
            <td>Location</td>
            <td>Created at</td>
            <td>Actions</td>
        </tr>
        </thead>

        <div class="panel-body">
            @foreach($adventures as $adventure)
                <tr>
                    <td>{{$adventure->id}}</td>
                    <td>{{$adventure->game_type}}</td>
                    <td>{{$adventure->created_by_name}}</td>
                    {{--<td>{{$adventure->max_nr_of_players}}</td>--}}
                    <td>{{$adventure->freeSlots}}</td>
                    <td>{{$adventure->city}}</td>
                    <td>{{$adventure->created_at}}</td>
                    <div class="row">
                        <div class="col-md-4">
                            @if($adventure->created_by == \Illuminate\Support\Facades\Auth::user()->id)
                            <td>
                                <a href="{{url('adventures/'.$adventure->id.'/manage')}}" name="edit" class="btn btn-sm btn-primary btn-block"> Manage Adventure</a>
                            </td>
                            @else
                            <td>
                                {!! Form::open(['route' => ["account.leaveAdventure", \Illuminate\Support\Facades\Auth::user()->id , $adventure->id],  'method'=>"post"]) !!}
                                {!! Form::submit('Leave adventure', ['class' =>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
                        </div>
                    </div>

                </tr>
            @endforeach
        </div>
    </table>
    </div>
@endsection