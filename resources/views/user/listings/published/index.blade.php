@extends('layouts.dashboard')

@section('title', 'Publish Listings')

@section('content')

    <div class="row">
        <div class="col">
            <h1>Published Listings</h1>
        </div>
    </div>

    <data-table endpoint="{{ route('api.datatable.published.listing.index') }}" post_method="edit" :area="{{ $area }}"></data-table>

@endsection
