@extends('layouts.app')

@section('title', 'Ad Network')


@section('content')

    <div class="wrapper">
        <div class="row">
            <div class="col">
{{--                <area-search></area-search>--}}

            </div>
        </div>
    </div>

{{--    @include('listings.partials._search')--}}

    <div class="wrapper">
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h1>Listings Categories</h1>
            </div>
        </div>
        <div class="row flex masonry">

            @foreach ($categories as $category)
                <div class="sm-col-6 md-col-4 lg-col-3 masonry__item">
                    <div class="panel shadow--5">
                        <div class="panel__header"><img class="list__icon" src="{{ asset('img/icons/') . '/' . $category->slug . '.svg'}}" alt="{{ $category->name }}">{{ $category->name }}</div>
                        <ul class="panel__list">
                            @foreach ($category->children as $sub)
                                <li class="list__item flex justify--between">
                                    <a href="{{ route('listings.index', [$area, $sub]) }}">
                                        {{ $sub->name }}</a> ({{ $sub->listings->count() }})
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if ($loop->index %3 == 1)
                    <div class="sm-col-6 md-col-4 lg-col-3 masonry__item">
                        <div class="panel bg--dark text--white shadow--5">
                            <div class="panel__body">
                                <a href="">
                                    <img  src="img/sponsers/crystalbars.svg" alt="" class="responsive__image mx-3 my-5">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
