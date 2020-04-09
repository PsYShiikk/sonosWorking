<div class="music_all">
    @foreach($utilisateur as $c)

        <div class="musicbox">
            <a href="" class="img_music">
                <img src="{{$c->avatar}}">
            </a>
            <a href="#" class="chanson">{{$c->forename}} {{$c->lastname}}</a>
            <a href="#"><span>@</span>{{$c->username}}</a>


        </div>

    @endforeach
</div>
