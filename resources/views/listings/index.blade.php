@extends('layouts.app')

@section('title', $category->name)

@section('content')

{{--@include('listings.partials._search', [--}}
{{--    'category' => $category--}}
{{--])--}}
<div class="wrapper">
    <div class="row">
        <div class="md-col-12">
            <h1>{{ $category->parent->name }} &nbsp; > &nbsp; {{ $category->name }}</h1>

            <listings-list :area="{{ $area }}" :category="{{ $category }}"></listings-list>

        </div>
    </div>
</div>
@endsection
