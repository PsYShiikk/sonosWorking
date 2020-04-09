@extends('layout.template')

@section('contenu')
    @if($user->count() == 0 && $music->count() == 0 && $playlist->count() == 0)
        <h2 class="center-music"> Nothing to show</h2>
    @else


        @if($user->count() == 1)
            <h2 class="center-music">User</h2>
            @include('FirstController._search', ['utilisateur' => $user])
            @elseif($user->count() > 1)
            <h2 class="center-music">Users</h2>
            @include('FirstController._search', ['utilisateur' => $user])
            @else
        @endif



        @if($music->count() == 1)
            <h2 class="center-music">Music</h2>
            @include('FirstController._chansons', ["chansons" => $music])
        @elseif($music->count() > 1)
            <h2 class="center-music">Musics</h2>
            @include('FirstController._chansons', ["chansons" => $music])
        @else
        @endif




        @if($playlist->count() == 1)
            <h2 class="center-music">Playlist</h2>
            @include('FirstController._noaddplaylists', ["playlist" => $playlist])
        @elseif($music->count() > 1)
            <h2 class="center-music">Playlists</h2>
            @include('FirstController._noaddplaylists', ["playlist" => $playlist])
        @else
        @endif




    @endif
@endsection
