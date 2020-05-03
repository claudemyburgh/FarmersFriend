@extends('layouts.dashboard')

@section('title', 'Favourited Listings')


@section('content')
    <div class="row">
        <div class="col">
            <h1>Favourited Listings</h1>
        </div>
    </div>
    <listings-filter :area="{{ $area }}" url="/api/listings/favourited">

    </listings-filter>
@endsection
