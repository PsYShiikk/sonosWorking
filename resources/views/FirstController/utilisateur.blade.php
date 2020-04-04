@extends('layout.template')

@section('contenu')

    <div class="top_user_page">
        <img src="{{$utilisateur->banner}}" alt="banner de {{$utilisateur->username}}" class="banner">
        @if(Auth::id() == $utilisateur->id)
        <a href="/changementprofil/{{$utilisateur->id}}" class="modify_profil" data-pjax><img src="/images/icones/icon_modify.png" alt="icon modifier"></a>
        @endif
        <div class="info_user">
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
                            <a href="/suivre/{{$utilisateur->id}}" class="btn follow">Following</a>
                        @else
                            <a href="/suivre/{{$utilisateur->id}}" class="btn follow">Follow</a>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>



    @if(Auth::id() == $utilisateur->id)
        <div class="container_user">
        //page pour moi
        </div>
    @else
        <div class="container_user">
            <h2>His music</h2>
            @include('FirstController._chansons', ["chansons" => $utilisateur->chansons])
        </div>
    @endif





@endsection
