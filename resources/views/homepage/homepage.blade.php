@extends('navigation')
@section('content')
        {{--main section--}}
        <br>
        <div class="text-center" id="news1" >
                <h3>
                        A quest to remember opens its gates for Romania! Roll initiative!
                </h3>

        </div>
        <br>
        <br>
        <div class="text-left" id="news2">
                Hear ye! Humans and elves, dwarves and orcs, warlocks, clerics, paladins and all manner of adventuring and enterprising individuals! A quest to remember is ready for action. Here you’ll be able to find parties to play with, start new gaming sessions with friends or strangers for your favorite games. Don’t know how to play a game? No worries. Click on “Begin your adventure” and choose what game you want to play. A table will be open and people will slowly join in as other players or a Game Master who can explain the rules and game to you. Always wanted to try Pathfinder, Dungeons and dragons, Numenera or other tabletop games? Go for it! Want to host a gaming session for D&D and want to unfold your terrible GM adventures and ideas for a party of unsuspecting players? You can begin your adventure there as well. Never had any role-playing experience with such games? Doesn’t matter, we’ve all rolled a critical fail at diplomacy or stealth and ended up being the main course at an Orcish wedding. Such is the life of a bard *coughs* I mean such are ups and down of adventuring. So who cares that the dwarf is now married to a female Orc called Helza Bloodbane? With enough ale, the dwarf won’t even notice!
                AQTR also has many other nice features like artwork to inspire your campaigns, courteously shared by amazing artists around the world, a section where you can share your ideas for campaigns, stories, home-brewed adventures and other events.
                We’re all RPG fans, we love games and the unique medium of storytelling they offer where You are the storyteller and story, the ink and the writer, the play and the audience, the master and the slayer of dragons. So join us in a quest to remember and start burning down inns, pillaging horses, assaulting some chests and ride off on some towers.

        </div>
        <br>
        <br>
        <div class="clearfix text-center" id="news3">
                <strong>You can start your own party or join an existing party of adventurer for many types of tabletop games.</strong>
                <br>
                <br>
                <a href="{{url('/adventures')}}" class="btn btn-danger btn-lg" id="custom-button"> Begin your adventure!</a>
        </div>
@endsection