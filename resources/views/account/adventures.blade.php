@extends('navigation')
@section('content')

        <table class="table table-hover table-condensed table-inverse">
            <thead>
            <th>#</th>
            <th>Game type</th>
            <th>Created by</th>
            <td>Max number of players</td>
            <th>Free slots</th>
            <th>Location</th>
            <th>Created at</th>
            <th>Actions</th>
            </thead>

            <tbody>
            @foreach($adventures as $adventure)
                <tr>
                    <td>{{$adventure->id}}</td>
                    <td>{{$adventure->game_type}}</td>
                    <td>{{$adventure->created_by_name}}</td>
                    <td>{{$adventure->max_nr_of_players}}</td>
                    <td>{{$adventure->freeSlots}}</td>
                    <td>{{$adventure->city}}</td>
                    <td>{{$adventure->created_at}}</td>
                    <div class="row">
                        <div class="col-md-4">

                        @if($adventure->created_by == \Illuminate\Support\Facades\Auth::user()->id)

                                <td>
                                    <a href="{{url('adventures/'.$adventure->id.'/manage')}}" name="edit" class="btn btn-sm btn-danger btn-block" id="custom-button"> Manage Adventure</a>
                                </td>
                            @else
                                <td>
                                    {!! Form::open(['route' => ["account.leaveAdventure", \Illuminate\Support\Facades\Auth::user()->id , $adventure->id],  'method'=>"post"]) !!}
                                    {!! Form::submit('Leave adventure', ['class' =>'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ["adventures.viewAdventure", \Illuminate\Support\Facades\Auth::user()->id , $adventure->id],  'method'=>"get"]) !!}
                                    {!! Form::submit('View adventure', ['class' =>'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            @endif
                        </div>
                    </div>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection