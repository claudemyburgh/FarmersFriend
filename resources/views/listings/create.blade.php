@extends('layouts.app')

@section('title', 'Create Listing')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center">
        <div class="md-col-6">
            <create-listing :area="{{$area}}"></create-listing>
        </div>
    </div>
</div>
@endsection

