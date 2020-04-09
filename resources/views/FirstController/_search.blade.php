<div class="music_all">
    @foreach($utilisateur as $c)

        <div class="musicbox">
            <a href="/utilisateur/{{$c -> id}}" class="img_music">
                <img src="{{$c->avatar}}">
            </a>
            <a href="/utilisateur/{{$c -> id}}" class="chanson">{{$c->forename}} {{$c->lastname}}</a>
            <a href="/utilisateur/{{$c -> id}}"><span>@</span>{{$c->username}}</a>


        </div>

    @endforeach
</div>
