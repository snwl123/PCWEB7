@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/register-and-login.css') }}" />
@endsection

@section('content')
            <div id="form-container">

                <div id="form">
                    
                        <div id = "form-header">{{ __('Login') }}</div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-fields">
                                <label for="email" class="form-label">{{ __('E-mail Address') }}</label>

                                <div class="form-input-container">
                                    <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    
                                    @error('email')
                                    <span class = "error-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-fields">
                                <label for="password" class="form-label">{{ __('Password') }}</label>

                                <div class="form-input-container">
                                    <input id="password" type="password" class="form-input" name="password" value="{{ old('password') }}" autofocus required autocomplete="current-password"> 
                                    @error('password')
                                    <span class = "error-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-remember-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-label" id="remember-me" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>


                            <div class="form-submit">
                                <button type="submit" id ="form-submit">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a id="forgot-password" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </div>

                        </form>
                </div>
            </div>
            
@endsection
