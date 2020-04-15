@extends('layouts.app')

@section('content')
{{--    @include('listings.partials._search')--}}

    <div class="wrapper">
        <div class="row flex">
            @foreach ($categories as $category)
                <div class="md-col-4">
                    <div class="panel shadow--1">
                        <div class="panel__header">{{ $category->name }}</div>
                        <ul class="list">
                            @foreach ($category->children as $sub)
                                <li class="list__item flex justify--between"><a href="{{ route('listings.index', [$area, $sub]) }}">{{ $sub->name }}</a> ({{ $sub->listings->count() }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
