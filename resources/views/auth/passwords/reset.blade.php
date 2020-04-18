@extends('layouts.app')

@section('title', 'Reset')

@section('content')
<div class="wrapper">
    <br>
    <div class="row flex justify--center">
        <div class="md-col-4">
            <div class="panel panel--default">
                <div class="panel__header">{{ __('Reset Password') }}</div>
                <div class="panel__body">
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form__group {{ $errors->has('email') ? ' has__danger' : '' }} ">
                            <label for="email" class="form__label font--bold">{{ __('E-Mail Address') }}</label>
                            <div class="form__wrap">
                                <i class="lunacon lunacon-mail-envelope"></i>
                                <input type="email" name="email" id="email" class="form__item" value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <strong class="form__helper">
                                    {{ $errors->first('email') }}
                                </strong>
                            @endif
                        </div>
                        <div class="form__group {{ $errors->has('password') ? ' has__danger' : '' }} ">
                            <label for="password" class="form__label font--bold">{{ __('Password') }}</label>
                            <input type="password" name="password" id="password" class="form__item" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <strong class="form__helper">
                                    {{ $errors->first('password') }}
                                </strong>
                            @endif
                        </div>
                        <div class="form__group">
                            <label for="password-confirm" class="form__label font--bold">{{ __('Password Confirm') }}</label>
                            <input id="password-confirm" type="password" class="form__item" name="password_confirmation">
                        </div>
                        <div class="form__group">
                            <button type="submit" class="btn btn--primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
