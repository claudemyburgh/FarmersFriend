@extends('layouts.dashboard')

@section('title', 'Unpublished Listings')

@section('content')
    @if ($listings->count())
        @foreach($listings as $listing)
            <div class="sm-col-6 md-col-4">
                @include('listings.partials._listing_own', $listing)
            </div>
        @endforeach
        <div class="md-col-12 p--tb">
            {{ $listings->links() }}
        </div>
    @else
        <p>No unpublished listings.</p>
    @endif
@endsection
