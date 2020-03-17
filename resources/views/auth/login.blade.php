@extends('layout.form')

@section('contenu')
                <h1 class="">Log in to Sonos</h1>


                    <form class="formulaire_form" method="POST" action="{{ route('login') }}">
                        @csrf


                                <div class="txtb">
                                    <input type="email" class="@error('email') focus error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <span data-placeholder="Mail"></span>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror







                                <div class="txtb">
                                    <input type="password" class="@error('password') focus error @enderror" name="password" required autocomplete="current-password">
                                    <span data-placeholder="Password"></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                <div class="button r" id="button-1">
                                    <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <div class="knobs"></div>
                                    <div class="layer"></div>
                                </div>
                                    <label class="forgot" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>


                                <button type="submit" class="btn form_btn">
                                    {{ __('Log in') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="forgot" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                    </form>

@endsection
