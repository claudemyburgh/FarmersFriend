@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="row flex justify--center">
            <div class="md-col-4">
                <div class="panel shadow--1">
                    <div class="panel__header">{{ __('Confirm Password') }}</div>

                    <div class="panel__body">
                        <p>
                            {{ __('Please confirm your password before continuing.') }}
                        </p>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form__group @error('password') has__danger @enderror">
                                <label for="password" class="form__label font--bold">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form__item " name="password"  autocomplete="current-password">

                                @error('password')
                                <span class="form__helper" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form__group">
                                <div>
                                    <button type="submit" class="btn btn--primary">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn--default" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
