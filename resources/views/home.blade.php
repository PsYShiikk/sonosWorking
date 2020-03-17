@extends('layout.template')

@section('contenu')

    <div class="preview_profile">


        <a href="/utilisateur/{{Auth::user()->id}}" class="pic" data-pjax>
            <img src="{{Auth::user()->avatar}}" alt="photo de {{ Auth::user()->username }}" >
        </a>
        <a href="/utilisateur/{{Auth::user()->id}}" class="profil_name_home" data-pjax>
            <span >{{Auth::user()->forename}} {{Auth::user()->lastname}}</span>
        </a>

        <a href="/utilisateur/{{Auth::user()->id}}" class="profil_username_home" data-pjax>
            <span>@</span>{{ Auth::user()->username }}
        </a>







        <span class="stats_home">{{Auth::user()->IlsMeSuivent()->count()}}
            @if(Auth::user()->IlsMeSuivent()->count() > 1)
                followers
            @else
                follower
            @endif
        </span>
        <span class="stats_home">{{Auth::user()->jeLesSuit()->count()}}
            @if(Auth::user()->jeLesSuit()->count() > 1)
                followings
            @else
                following
            @endif
        </span>
        <div class="add_music_btn">
            <a href="/musics/{{Auth::user()->id}}" class="add_music" data-pjax><img src="/images/icones/icon_music.png" alt="icone_musique" class="icon_music_home">My music</a>
            <a href="/chanson/nouvelle" class="add_music" data-pjax><img src="/images/icones/icon_plus.png" alt="icone_ajout_musique" class="icon_music_home">Add a music</a>
        </div>
    </div>







                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            @{{ session('status') }}
                        </div>
                    @endif


@endsection
