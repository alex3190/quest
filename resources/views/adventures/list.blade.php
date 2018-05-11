@extends('navigation')
@section('content')
    {{--<div class="panel panel-default">--}}
        {{--<div class="panel-body text-center">--}}
                {{--“Welcome traveler, your journey awaits. Here you can create a table to start your journey with friends and other adventurers. “--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="text-center" id="news1" >
        <h4>
            Welcome, traveler. Your journey awaits!
        </h4>
    </div>
    <div class="text-center" id="news2">
        If you want to join an adventure, just click on 'Join Adventure' to see the details of each one, and then fill your application in!
        For the adventures you created, instead of 'Join Adventure', you are able to Manage your adventure instead!
        The creator of the adventure will receive your request and approve or deny it. Don't be sad if your request gets denied! Maybe his or her party is full, or maybe he has one too many barbarians.
        You can apply to as many adventures as you'd like!

        If you decide you don't like any of the adventures, you can start one of your own <a href="{{route('adventures.create')}}">here! </a>
    </div>

    <br>
        <table class="table table-condensed table-responsive">
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
                                        <a href="{{url('adventures/'.$adventure->id.'/manage')}}" name="edit" class="btn btn-sm btn-danger" id="custom-button"> Manage Adventure</a>
                                    </td>
                                @elseif(in_array($adventure->id, $cantJoinAdventures))
                                    <td>
                                        Sorry, you already applied
                                    </td>
                                @else
                                    <td>
                                        <a href="{{url('adventures/'.$adventure->id.'/join')}}" name="join" class="btn btn-sm btn-danger" id="custom-button"> Join Adventure</a>

                                    </td>
                                @endif
                                    <td>
                                        <a href="{{url('adventures/'.$adventure->id.'/view')}}" name="view" class="btn btn-sm btn-danger" id="custom-button"> View Adventure</a>
                                    </td>
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



