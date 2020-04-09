@extends('layout.template')

@section('contenu')

    <h2 class="center-music">{{ $playlist->name }}</h2>

    @include('FirstController._chansons', ["chansons" => $playlist->chansons])
@endsection

