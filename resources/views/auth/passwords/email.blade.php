@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="wrapper">
    <br>
    <div class="row flex justify--center">
        <div class="md-col-4">
            <div class="panel shadow--1">
                <div class="panel__header">{{ __('Reset Password') }}</div>
                <div class="panel__body">
                    @if (session('status'))
                        <div class="form__group">
                            <div class="notify notify--success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                         @csrf
                         <div class="form__group {{ $errors->has('email') ? ' has__danger' : '' }} ">
                             <label for="email" class="form__label font--bold">{{ __('E-Mail Address') }}</label>
                             <input type="email" name="email" id="email" class="form__item" value="{{ old('email') }}">
                             @if ($errors->has('email'))
                                 <strong class="form__helper">
                                     {{ $errors->first('email') }}
                                 </strong>
                             @endif
                         </div>
                         <div class="form__group">
                             <button type="submit" class="btn btn--primary">
                                 {{ __('Send Password Reset Link') }}
                             </button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
