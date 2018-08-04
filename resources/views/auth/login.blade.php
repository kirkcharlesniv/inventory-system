@extends('layouts.auth_template')
@section('page_title', 'Login')

@section('body')
<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}" aria-label="{{ __('Register') }}">
    @csrf

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

    <div class="container-login100-form-btn m-t-17">
        <button class="login100-form-btn">
            {{ __('Login') }}
        </button>
    </div>

    {{--<div class="w-full text-center p-t-55">--}}
        {{--<a href="{{ URL::to('/register') }}" class="txt2 bo1">--}}
            {{--Sign Up--}}
        {{--</a>--}}
    {{--</div>--}}
</form>
@endsection