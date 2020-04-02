@extends('layout.template')

@section('contenu')

    <h2 class="center-music">Music of {{$utilisateur->username}}</h2>

    @include('FirstController._chansons', ["chansons" => $utilisateur->chansons])
@endsection

