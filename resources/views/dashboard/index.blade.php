@extends('layouts.dashboard')

@section('title', 'Dashboard')


@section('content')
    <div class="row">
        <div class="md-col-12">
            <div class="panel shadow--3">
                <div class="panel__body">
                    <line-chart url="api/dashboard/listings-chart" activities="Views"></line-chart>

                </div>
            </div>
        </div>
    </div>
@endsection
