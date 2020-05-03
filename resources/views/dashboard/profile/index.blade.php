@extends('layouts.dashboard')

@section('title', Auth::user()->name . ' Profile')


@section('content')
    <div class="row">
        <div class="md-col-9">
            <user-profile></user-profile>
        </div>
    </div>
@endsection
