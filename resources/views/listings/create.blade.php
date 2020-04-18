@extends('layouts.app')

@section('title', 'Create Listing')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center">
        <div class="md-col-6">

                    <x-listing.create-listing></x-listing.create-listing>
{{--            <create-listing :area="{{$area}}"></create-listing>--}}

    </div>
</div>
@endsection

