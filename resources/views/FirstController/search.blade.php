@extends('layout.template')

@section('contenu')

@include('FirstController._search', ['utilisateur' => $user ,'music' => $music])

@endsection
