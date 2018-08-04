@extends('layouts.auth')
@yield('page_title', 'Register')

<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
    @csrf

    <div class="p-t-31 p-b-9">
        <span class="txt1">{{ __('Name') }}</span>
    </div>
    <div class="wrap-input100 validate-input" data-validate = "Name is required">
        <input id="name" class="input100" type="text" name="name" value="{{ old('name') }}" required autofocus>
        <span class="focus-input100"></span>
    </div>
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

    <div class="p-t-31 p-b-9">
        <span class="txt1">{{ __('E-Mail Address') }}</span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Email is required">
        <input id="email" class="input100" type="text" name="email" value="{{ old('email') }}" required>
        <span class="focus-input100"></span>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="p-t-13 p-b-9">
        <span class="txt1">{{ __('Password') }}</span>
    </div>
    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input id="password" class="input100" type="password" name="password">
        <span class="focus-input100"></span>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="p-t-13 p-b-9">
        <span class="txt1">{{ __('Confirm Password') }}</span>
    </div>
    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input id="password-confirm" class="input100" type="password" name="password_confirmation" required>
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn m-t-17">
        <button class="login100-form-btn">
            {{ __('Register') }}
        </button>
    </div>

    <div class="w-full text-center p-t-55">
        <a href="{{ URL::to('/login') }}" class="txt2 bo1">
            Login
        </a>
    </div>
</form>