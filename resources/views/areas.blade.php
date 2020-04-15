@extends('layouts.app')

@section('title', 'Areas')

@section('content')

<div class="wrapper">
    <div class="row">
        @foreach ($areas as $country)
            <div class="md-col-12">
                <h2><a href="{{ route('user.area.store', $country) }}">{{ $country->name }}</a></h2>
                <div class="row">
                    @foreach ($country->children as $state)
                        <div class="md-col-3">
                            <div class="panel shadow--4">
                                <div class="panel__header">
                                    <a href="{{ route('user.area.store', $state) }}">{{ $state->name }}</a>
                                </div>
                                <ul class="list">
                                    @foreach ($state->children as $city)
                                        <li class="list__item">
                                            <a href="{{ route('user.area.store', $city) }}">{{ $city->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
