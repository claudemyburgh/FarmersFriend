@extends('layouts.app')

@section('title', $category->name)

@section('content')

{{--@include('listings.partials._search', [--}}
{{--    'category' => $category--}}
{{--])--}}
<div class="wrapper">
    <div class="row">
        <div class="md-col-12">
            <h4>{{ $category->parent->name }} &nbsp; > &nbsp; {{ $category->name }}</h4>
            @if ($listings->count())
                <listings-list :area="{{ $area }}" :category="{{ $category }}"></listings-list>
            @else
                <p>No listings found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
