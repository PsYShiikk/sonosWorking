@extends('layout.template')

@section('contenu')

    <h2 class="center-music">Playlists of {{$utilisateur->username}}</h2>

    @include('FirstController._noaddplaylists    ', ["playlist" => $utilisateur->playlists])
@endsection
