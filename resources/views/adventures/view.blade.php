@extends('navigation')
@section('content')
</br>
<div class="text-center" id="news1" >
    <h4>
        Welcome, traveler. Your journey awaits!
    </h4>
</div>
</br>
<div class="text-center" id="news2">
    Here you can see details about the adventure you're participating to! You can't do much except for withdrawing your application.
</div>

</br>
</br>

<table class="table table-condensed table-responsive">
    <tr>
        <th>Actions/Info</th>
        <th>Player name</th>
        <th>Availability</th>
        <th>Can we play at this adventurer's residence?</th>
        <th>Can he/she be dm?</th>
        <th>Preferred playing location</th>
        <th>What can he/she bring?</th>
        <th>Previous tabletop experience</th>
        <th>Message for the creator</th>
        <th>Application status</th>

    </tr>
    </thead>

    <tbody>
    <tr>
        @foreach($attendees as $attendee)
            @if($attendee->user_id == \Illuminate\Support\Facades\Auth::user()->id)
            <td>
                {!! Form::open(['route' => ["account.leaveAdventure", \Illuminate\Support\Facades\Auth::user()->id , $adventure->id],  'method'=>"post"]) !!}
                {!! Form::submit('Leave adventure', ['class' =>'btn btn-sm btn-danger']) !!}
                {!! Form::close() !!}
            </td>
            @else

                <td>
                    You have no power here!
                </td>

            @endif
            <td>{{$attendee->name}}</td>
            <td>{{$attendee->availability}}</td>
            <td>
                @if($attendee->is_host == 1)
                    Yes
                @else
                    No
                @endif
            </td>
            <td>
                @if($attendee->is_dm == 1)
                    Yes
                @else
                    No
                @endif
            </td>
            <td>
                @if($attendee->place == NULL)
                    None
                @else
                    $attendee->place
                @endif
            </td>
            <td>
                @if($attendee->inventory == NULL)
                    None
                @else
                    $attendee->inventory
                @endif
            </td>
            <td>
                @if($attendee->experience_with_games == NULL)
                    None
                @else
                    $attendee->experience_with_games
                @endif
            </td>
            <td>
                @if($attendee->message_to_creator == NULL)
                    None
                @else
                    $attendee->message_to_creator
                @endif
            </td>
            <td>{{ucfirst($attendee->application_status)}}</td>

    </tr>
    @endforeach
    </tbody>
</table>


@endsection