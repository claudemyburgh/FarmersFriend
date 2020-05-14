@extends('layouts.dashboard')

@section('title', 'Unpublished Listings')

@section('content')

    <div class="row">
        <div class="col">
            <h1>Unpublished Listings</h1>
        </div>
    </div>
    <data-table endpoint="{{ route('api.datatable.unpublished.listing.index') }}" post_method="edit" :area="{{ $area }}"></data-table>

{{--    <listings-filter :area="{{ $area }}" url="/api/listings/unpublished"></listings-filter>--}}
@endsection
