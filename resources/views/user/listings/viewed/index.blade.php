@extends('layouts.dashboard')

@section('title','Recently Viewed Listings')
@section('content')


    <div class="row">
        <div class="col">
            <h1>Showing your last {{ $indexLimit }} viewed listings.</h1>
        </div>
    </div>

    <listings-filter :area="{{ $area }}" url="/api/listings/viewed"></listings-filter>

@endsection
