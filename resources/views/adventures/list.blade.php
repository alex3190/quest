@extends('navigation')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
        “Welcome traveler, your journey awaits. Here you can create a table to start your journey with friends and other adventurers. “
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
                            <td>Who's the DM?</td>
                            <td>Max number of players</td>
                            <td>Free slots</td>
                            <td>Location</td>
                            <td>Created at</td>
                            <td>Actions</td>
                        </tr>
                        </thead>

                        @foreach($adventures as $adventure)
                            <tr>
                                <td>{{$adventure->id}}</td>
                                <td>{{$adventure->game_type}}</td>
                                <td>{{$adventure->dungeon_master_name}}</td>
                                <td>{{$adventure->max_nr_of_players}}</td>
                                {{--todo fix this to calculate available nr of players--}}
                                <td>{{0}}</td>
                                <td>{{$adventure->city}}</td>
                                <td>{{$adventure->created_at}}</td>
                                <div class="row">
                                        <div class="col-md-4">
                                            <td>
                                            <a href="{{url('adventures/'.$adventure->id.'/join')}}" name="join" class="btn btn-sm btn-primary btn-block"> Join Adventure</a>
                                            </td>
                                        </div>
                                    </div>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



