@extends('layouts.app')

@section('title', 'Edit Listing')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center">
        <div class="md-col-6">

{{--            <drop-zone--}}
{{--                :object="{{ $listing->getMedia('listing') }}"--}}
{{--                photo="listing"--}}
{{--                upload="{{ route('api.listing.image.upload', [$listing])  }}"--}}
{{--                remove="api/listing">--}}
{{--            </drop-zone>--}}
                <x-listing.-upload-image :listing="$listing"></x-listing.-upload-image>

                <div class="panel shadow--1">
                    <div class="panel__header">
                        <div>
                            <div>
                                Continue editing listing
                            </div>
                            <small class="text--gray"><i class="lunacon lunacon-key"></i> {{ $listing->key }}</small>
                        </div>
                        @if ($listing->live())
                            <span class="pull-right"><a href="{{ route('listings.show', [$area, $listing]) }}"><i class="lunacon lunacon-eye"></i> View listing</a></span>
                        @endif
                    </div>

                    <img src="{{$listing->getFirstMediaUrl('thumb')}}" />


                    <div class="panel__body">
                        <form action="{{ route('listings.update', [$area, $listing]) }}" method="post">
                            <div class="form__group{{ $errors->has('title') ? ' has__danger' : '' }}">
                                <label for="title" class="form__label front--bold">Title</label>
                                <input type="text" name="title" id="title" class="form__item" value="{{ $listing->title }}">
                                @if ($errors->has('title'))
                                    <span class="form__helper">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif
                            </div>
                            @include('listings.partials.forms._areas')
                            @include('listings.partials.forms._categories')
                            <div class="form__group{{ $errors->has('body') ? ' has__danger' : '' }}">
                                <label for="body" class="form__label front--bold">Body</label>
                                <textarea name="body" id="body" cols="30" rows="8" class="form__item">{{ $listing->body }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="form__helper">
                                        {{ $errors->first('body') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form__group flex justify--between">
                                <button type="submit" class="btn btn--primary-gradient">Save</button>
                                @if (!$listing->live())
                                    <button type="submit" name="payment" value="true" class="btn btn--secondary-gradient">Publish Listing</button>
                                @endif
                            </div>
                            @if ($listing->live())
                                <input type="hidden" name="category_id" value="{{ $listing->category_id }}">
                            @endif
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
