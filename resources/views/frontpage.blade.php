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
                                <li class="list__item ">
                                    <a class="flex justify--between" href="{{ route('listings.index', [$area, $sub]) }}">
                                        <span>{{ $sub->name }}</span> <span class="xs-float-right">({{ $sub->listings->count() }})</span></a>
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
                                    <img  src="img/sponsors/{{ ['crystalbars.svg', 'dbc.svg'][rand(0,1)] }}" alt="" class="responsive__image mx-3 my-5">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="md-col-8 md-offset-2">
                <div class="bq mt-9 shadow--5 ">
                    <div class="panel p-5">
                        <div class="panel__body text-align-center">
                            @php
                                $bible = Inspire::quote();
                            @endphp
                            <h2 class="mb-4">{{ $bible['name']  }}</h2>
                            <p>{{ $bible['passage'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
