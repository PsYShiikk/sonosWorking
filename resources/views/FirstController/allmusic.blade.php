@extends('layout.template')

@section('contenu')
    @include('FirstController._chansons', ["chansons" => $crand])
@endsection
