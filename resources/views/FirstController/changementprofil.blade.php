@extends('layout.template')


@section('contenu')

@if($utilisateur->id == Auth::id())
<div class="container_changementprofil">

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="center">Informations of {{$utilisateur->username}}</h2>
    <form action="/updateProfil/{{$utilisateur->id}}" method="post" enctype="multipart/form-data" class="formnouvellechanson">
        @csrf
        <div class="txtb">
            <input type="text" class="@error('text') error @enderror focus" name="username" autocomplete="offs" value="{{$utilisateur->username}}">
            <span data-placeholder="Username"></span>
        </div>

        <div class="two_field">

            <div class="txtb half">
                <input id="forename" type="text" class="form-control @error('forename') error focus @enderror focus" name="forename" value="{{$utilisateur->forename}}" autocomplete="offs">
                <span data-placeholder="Forename"></span>
            </div>


            @error('forename')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

            <div class="txtb half">
                <input id="lastname" type="text" class="form-control @error('lastname') error focus @enderror  focus" name="lastname" value="{{$utilisateur->lastname}}" autocomplete="offs">
                <span data-placeholder="Lastname"></span>
            </div>


            @error('lastname')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

        </div>

        <div class="ligneform">
            <div class="fileuplaod">
                <label for="pdp" class="input-file-trigger"><img src="/images/icones/icon_addphoto.png" class="icon_music_add">Select a profil picture</label>
                <input type="file" name="pdp" id="pdp" class="input-file" accept="image/*">
                <p class="file-return"></p>
            </div>
            <div class="fileuplaod">
                <label for="pdc" class="input-file-trigger2"><img src="/images/icones/icon_addphoto.png" class="icon_music_add">Select a banner</label>
                <input type="file" name="pdc" id="pdc" class="input-file2" accept="image/*">
                <p class="file-return2"></p>
            </div>

        </div>

        <input type="submit" value="Change" class="btn sendform">

    </form>
</div>
@else
    tu n'as rien a faire ici !

    @endif

@endsection
