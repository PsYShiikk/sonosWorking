@extends('layout.template')

@section('contenu')

    <div class="top_user_page">
        <img src="{{$utilisateur->banner}}" alt="banner de {{$utilisateur->username}}" class="banner">
        @if(Auth::id() == $utilisateur->id)
        <a href="/changementprofil/{{$utilisateur->id}}" class="modify_profil" data-pjax><img src="/images/icones/icon_modify.png" alt="icon modifier"></a>
        @endif
        <div class="info_user" id="info_user">
            <div class="pdp"><img src="{{$utilisateur->avatar}}" alt="photo de {{$utilisateur->username}}" class="photo_de_profil"></div>

            <span >{{$utilisateur->forename}} {{$utilisateur->lastname}}</span>
            <div><span>@</span>{{ $utilisateur->username }}</div>
            <div>
                <div>
                <span class="stats_home">
                    {{$utilisateur->IlsMeSuivent()->count()}}
                    @if($utilisateur->IlsMeSuivent()->count() > 1)
                        followers
                    @else
                        follower
                    @endif
                </span>
                <span class="stats_home">
                    {{$utilisateur->jeLesSuit()->count()}}
                    @if($utilisateur->jeLesSuit()->count() > 1)
                        followings
                    @else
                        following
                    @endif
                </span>
                </div>
                @auth
                    @if(Auth::id() != $utilisateur->id)
                        @if(Auth::user()->jeLesSuit->contains($utilisateur->id))
                            <a href="/suivre/{{$utilisateur->id}}" class="btn follow" data-barba-prevent>Following</a>
                        @else
                            <a href="/suivre/{{$utilisateur->id}}" class="btn follow" data-barba-prevent>Follow</a>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>



    @if(Auth::id() == $utilisateur->id)
        <div class="container_user">
            @if($utilisateur->jeLike()->count() > 0)
                <div class="liked_music">
                    <div class="top_home_music">
                        <span class="title_home">Your liked musics</span>
                        <a href="/liked" class="link_home">show more</a>

                    </div>
                    @include('FirstController._chansons', ["chansons" => $chanson = $utilisateur->jeLike()->inRandomOrder()->limit(5)->get()])
                </div>
            @else
            @endif
            @if($utilisateur->playlists()->count())
                <div class="playlist_music">
                    <div class="top_home_music">
                        <span class="title_home">Your playlists</span>
                        <a href="/playlists/{{Auth::user()->id}}" class="link_home">show more</a>
                    </div>

                    @include('FirstController._noaddplaylists    ', ["playlist" => $utilisateur->playlists()->inRandomOrder()->limit(5)->get()])
                </div>
            @else
            @endif
        </div>
    @else
        <div class="container_user">
            @if($utilisateur->chansons->count()!=0)
                <span class="title_home">His music</span>
            @include('FirstController._chansons', ["chansons" => $utilisateur->chansons])
                @else
                <span class="title_home">Not music yet !</span>
                @endif
        </div>
    @endif





@endsection
