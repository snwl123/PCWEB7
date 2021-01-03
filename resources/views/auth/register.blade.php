@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/register-and-login.css') }}" />
@endsection

@section('content')
                <div id="form-container">

                    <div id="form">
                        
                        <div id = "form-header">{{ __('Register') }}</div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-fields">
                                <label for="name" class="form-label">{{ __('Name') }}</label>

                                <div class="form-input-container">
                                    <input id="name" type="text" class="form-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-fields">
                                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>

                                <div class="form-input-container">
                                    <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-fields">
                                <label for="password" class="form-label">{{ __('Password') }}</label>

                                <div class="form-input-container">
                                    <input id="password" type="password" class="form-input" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-fields">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                                <div class="form-input-container">
                                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-submit">
                                <button type="submit" id="form-submit">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
@endsection
