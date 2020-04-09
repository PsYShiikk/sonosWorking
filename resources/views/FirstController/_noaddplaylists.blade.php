
    <div class="music_all">
        @foreach($playlist as $c)

            <div class="musicbox">
                <a href="/playlists/{{$c->user_id}}/{{$c->id}}" class="img_music">
                    <img src="{{$c->url_photo}}">
                </a>
                <a href="/playlists/{{$c->user_id}}/{{$c->id}}" class="chanson">{{$c->name}}</a>
            </div>

        @endforeach
    </div>
