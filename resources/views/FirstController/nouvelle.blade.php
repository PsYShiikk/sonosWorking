@extends('layout.template')

@section('contenu')



    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/chanson/create" method="post" enctype="multipart/form-data" class="formnouvellechanson">
        <h2>Upload a new song</h2>
        @csrf
    <div class="ligneform">
        <div class="txtb">
            <input type="text" class="@error('nom') focus error @enderror" name="nom" value="{{ old('nom') }}" required>
            <span data-placeholder="Title"></span>
        </div>

        <div class="txtb">
            <input type="text" class="@error('nom') focus error @enderror" name="style" value="{{ old('style') }}" required>
            <span data-placeholder="Style"></span>
        </div>
    </div>

        <div class="ligneform">
            <div class="fileuplaod">
                <label for="namechanson" class="input-file-trigger"><img src="/images/icones/icon_addmusic.png" class="icon_music_add">Select a song</label>
                <input type="file" name="chanson" required id="namechanson" class="input-file" accept="audio/*">
                <p class="file-return"></p>
            </div>
            <div class="fileuplaod">
                <label for="coverchanson" class="input-file-trigger2"><img src="/images/icones/icon_addphoto.png" class="icon_music_add">Select a cover</label>
                <input type="file" name="cover" required id="coverchanson" class="input-file2" accept="image/*">
                <p class="file-return2"></p>
            </div>

        </div>




            <input type="submit" value="Send !" class="btn sendform">

    </form>


@endsection


