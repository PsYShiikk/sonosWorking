
@foreach($playlists as $p)

    <a class="playlist_box" href="/playlists/{{$utilisateur->id}}/{{$p->id}}" >
        <div class="playlist_img"><img src="{{$p->url_photo}}"></div>
        <div class="playlist_name">{{$p->name}}</div>
    </a>


@endforeach

