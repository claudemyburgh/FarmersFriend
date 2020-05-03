@extends('layouts.dashboard')

@section('title', Auth::user()->name . ' Profile change password')


@section('content')
    <div class="row">
        <div class="md-col-9">
            <h1>Change Password</h1>
            <div class="panel shadow--1">
                <div class="panel__body">
                    <form action="{{ route('dashboard.password.store', [$area]) }}" method="post">
                        @csrf
                        <div class="form__group">
                            <label for="password_current" class="form__label font--bold">Current Password</label>
                            <div class="form__wrap">
                                <input type="password" name="password_current" id="password_current" class="form__item">
                            </div>
                        </div>
                        <div class="form__group @error('password') has--danger  @enderror">
                            <label for="password" class="form__label font--bold">New Password</label>
                            <div class="form__wrap">
                                <input type="password" name="password" id="password" class="form__item">
                            </div>
                            @error('password')
                                <span class="form__helper" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form__group">
                            <label for="password_conformation" class="form__label font--bold">Current Password</label>
                            <div class="form__wrap">
                                <input type="password" name="password_conformation" id="password_conformation" class="form__item">
                            </div>
                        </div>
                        <div class="form__group">
                            <button type="submit" class="btn btn--danger">CHANGE PASSWORD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
