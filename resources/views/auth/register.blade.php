@extends('layout.form')

@section('contenu')
    <h1>Register to Sonos</h1>


                    <form class="formulaire_form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf



                                <div class="txtb">
                                    <input id="username" type="text" class="form-control @error('username') error focus @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">
                                    <span data-placeholder="Username"></span>
                                </div>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="two_field">

                                    <div class="txtb half">
                                        <input id="forename" type="text" class="form-control @error('forename') error focus @enderror" name="forename" value="{{ old('forename') }}" required autocomplete="off">
                                        <span data-placeholder="Forename"></span>
                                    </div>


                                    @error('forename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="txtb half">
                                        <input id="lastname" type="text" class="form-control @error('lastname') error focus @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="off">
                                        <span data-placeholder="Lastname"></span>
                                    </div>


                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>





                        <div class="txtb">
                            <input type="email" class="@error('email') focus error @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                            <span data-placeholder="Mail"></span>
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


<div class="two_field">

                        <div class="txtb half">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                            <span data-placeholder="Password"></span>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <div class="txtb half">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                            <span data-placeholder="Password"></span>
                        </div>
</div>



                                <button type="submit" class="btn form_btn">
                                    {{ __('Register') }}
                                </button>

                    </form>

@endsection
