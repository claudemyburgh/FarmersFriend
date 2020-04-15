@extends('layouts.dashboard')

@section('title','Recently Viewed Listings')
@section('content')
    <p>Showing your last {{ $indexLimit }} viewed listings.</p>
    @if ($listings->count())
        @foreach($listings as $listing)
            <div class="sm-col-6 md-col-4">
                @include('listings.partials._listing', $listing)
            </div>
        @endforeach
    @else
        <p>You have no viewed listings.</p>
    @endif
@endsection
