@extends('layouts.app')

@section('title', 'Areas')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12">
                @foreach ($areas as $country)
                    <div class="md-col-12">
                        <h3><a href="{{ route('user.area.store', $country) }}">{{ $country->name }}</a></h3>
                        <div class="row flex">
                            @foreach ($country->children as $state)
                                <div class="md-col-4">
                                    <div class="panel shadow--2">
                                        <div class="panel__header">
                                            <a href="{{ route('user.area.store', $state) }}">  {{ $state->name }}</a>
                                        </div>
                                        <div class="panel__body">
                                            <ul>
                                                @foreach ($state->children as $city)
                                                    <li> <a href="{{ route('user.area.store', $city) }}">{{ $city->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
