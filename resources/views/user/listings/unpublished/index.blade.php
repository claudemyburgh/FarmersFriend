@extends('layouts.dashboard')

@section('title', 'Unpublished Listings')

@section('content')

    <div class="row">
        <div class="col">
            <h1>Unpublished Listings</h1>
        </div>
    </div>

    <listings-filter :area="{{ $area }}" url="/api/listings/unpublished"></listings-filter>
@endsection
