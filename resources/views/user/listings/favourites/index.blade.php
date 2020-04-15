@extends('layouts.dashboard')

@section('title', 'Favourite Listings')


@section('content')
    @if ($listings->count())
        @each ('listings.partials._listing_favourite', $listings, 'listing')
        {{ $listings->links() }}
    @else
        <p>No favourite listings.</p>
    @endif
@endsection
