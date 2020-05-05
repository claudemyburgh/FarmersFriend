@extends('layouts.dashboard')

@section('title', 'Publish Listings')

@section('content')

    <div class="row">
        <div class="col">
            <h1>Published Listings</h1>
        </div>
    </div>

    <listings-filter :area="{{ $area }}"  url="/api/listings/published">

    </listings-filter>

@endsection
