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

    <form action="/playlist/create" method="post" enctype="multipart/form-data" class="formnouvellechanson">
        <h2>Create a playlist</h2>

        @csrf

            <div class="txtb">
                <input type="text" class="@error('nom') focus error @enderror" name="name" value="{{ old('nom') }}" required autocomplete="off">
                <span data-placeholder="Name"></span>
            </div>






            <div class="fileuplaod">
                <label for="coverchanson" class="input-file-trigger2"><img src="/images/icones/icon_addphoto.png" class="icon_music_add">Select a cover</label>
                <input type="file" name="cover" required id="coverchanson" class="input-file2" accept="image/*">
                <p class="file-return2"></p>
            </div>






        <input type="submit" value="Create !" class="btn sendform">

    </form>


@endsection


