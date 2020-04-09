@extends('layout.template')

@section('contenu')

{{ $music->count() }}
@include('FirstController._search', ['utilisateur' => $user])
@include('FirstController._chansons', ["chansons" => $music])

@endsection
