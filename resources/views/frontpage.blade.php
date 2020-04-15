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

    <div class="wrapper">          <br>
        <br>
        <br>
        <br>
        <div class="row flex">

            @foreach ($categories as $category)
                <div class="sm-col-6 md-col-4 lg-col-3">
                    <div class="panel shadow--5">
                        <div class="panel__header"><img class="list__icon" src="{{ asset('img/icons/') . '/' . $category->slug . '.svg'}}" alt="{{ $category->name }}">{{ $category->name }}</div>
                        <ul class="list">
                            @foreach ($category->children as $sub)
                                <li class="list__item flex justify--between">
                                    <a href="{{ route('listings.index', [$area, $sub]) }}">
                                        {{ $sub->name }}</a> ({{ $sub->listings->count() }})
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
{{--                @if ($loop->index %3 == 2)--}}
{{--                    <div class="sm-col-6 md-col-4 lg-col-3">--}}
{{--                        <div class="panel shadow--5">--}}
{{--                            <div class="panel__body">--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium alias aliquam aut, corporis culpa cupiditate dignissimos explicabo harum iure minima modi mollitia non nulla rem sint temporibus unde ut.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
            @endforeach
        </div>
    </div>

@endsection
