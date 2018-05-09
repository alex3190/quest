@extends('navigation')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
                “Welcome traveler, your journey awaits. Here you can create a table to start your journey with friends and other adventurers. “
            </div>
        </div>
    </div>

        <table class="table table-hover table-condensed table-responsive table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Game type</th>
                <th>Is there a DM?</th>
                <th>Adventure creator</th>
                <th>Free slots</th>
                <th>Location</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                @foreach($adventures as $adventure)
                    <tr>
                        <td>{{$adventure->id}}</td>
                        <td>{{$adventure->game_type}}</td>
                        <td>{{$adventure->dungeon_master_name}}</td>
                        <td>{{$adventure->created_by_name}}</td>
                        <td>{{$adventure->freeSlots}}</td>
                        <td>{{$adventure->city}}</td>
                        <td>{{$adventure->created_at}}</td>
                        <div class="row">
                            <div class="col-md-4">

                                @if(in_array($adventure->id, $isCreatorOf))
                                    <td>
                                        <a href="{{url('adventures/'.$adventure->id.'/manage')}}" name="edit" class="btn btn-sm btn-primary btn-block"> Manage Adventure</a>
                                    </td>
                                @elseif(in_array($adventure->id, $cantJoinAdventures))
                                    <td>
                                        'Sorry, you already applied'
                                    </td>
                                @else
                                    <td>
                                        <a href="{{url('adventures/'.$adventure->id.'/join')}}" name="join" class="btn btn-sm btn-primary btn-block"> Join Adventure</a>

                                    </td>
                                @endif



                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>

    <div style="float: right;">
        {{ $adventures->links() }}
    </div>
@endsection



