@extends('layouts.app')

@section('title', 'Create Listing')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center">
        <div class="md-col-6">
            <div class="panel shadow--1">
                <div class="panel__header">Create listing</div>
                <div class="panel__body">
                    <form action="{{ route('listings.store', [$area]) }}" method="post">
                        <div class="form__group{{ $errors->has('title') ? ' has__danger' : '' }}">
                            <label for="title" class="form__label font--bold">Title</label>
                            <input type="text" name="title" id="title" class="form__item" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="form__helper">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        @include('listings.partials.forms._areas')
                        @include('listings.partials.forms._categories')
                        <div class="form__group{{ $errors->has('body') ? ' has__danger' : '' }}">
                            <label for="body" class="form__label font--bold">Body</label>
                            <textarea name="body" id="body" cols="30" rows="8" class="form__item">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <span class="form__helper">
                                    {{ $errors->first('body') }}
                                </span>
                            @endif
                        </div>
                        <div class="form__group">
                            <button type="submit" class="btn btn--primary">Save</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{--<create-listing :area="{{$area}}"></create-listing>--}}

