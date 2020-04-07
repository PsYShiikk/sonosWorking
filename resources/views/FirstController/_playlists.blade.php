
    @foreach($playlists as $p)

        <a class="playlist_box" href="/add/playlist/{{$p->id}}" data-barba-prevent>
            <div class="playlist_img"><img src="{{$p->url_photo}}"></div>
            <div class="playlist_name">{{$p->name}}</div>
        </a>


    @endforeach

