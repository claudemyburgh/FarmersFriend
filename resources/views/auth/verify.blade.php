
@extends('layouts.app')

@section('title', 'Verify')

@section('content')
<div class="wrapper">
    <br>
    <div class="row flex justify--center">
        <div class="md-col-4">
            <div class="panel shadow--1">
                <div class="panel__header">{{ __('Verify Your Email Address') }}</div>
                <div class="panel__body">
                    @if (session('resent'))
                        <div class="notify notify--success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a onclick="event.preventDefault(); document.getElementById('resend').submit();" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        <form id="resend" class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
