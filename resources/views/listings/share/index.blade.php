@extends('layouts.app')

@section('title', 'Share Listing')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center">
        <div class="md-col-6">
            <div class="panel shadow--1">
                <div class="panel__header">Share listing <em>{{ $listing->title }}</em></div>
                <div class="panel__body">
                    <div class="notify notify--info-light">Share this listing with up to 5 people</div>

                    <form action="{{ route('listings.share.store', [$area, $listing]) }}" method="post" autocomplete="off">
                        @foreach (range(0, 4) as $n)
                            <div class="form__group{{ $errors->has('emails.' . $n) ? ' has__danger' : '' }}">
                                <label class="form__label font--bold" for="emails.{{ $n }}" class="hidden">Email</label>
                                <input type="text" name="emails[]" id="emails.{{ $n }}" class="form__item" placeholder="someone@somewhere.com" value="{{ old('emails.' . $n) }}">

                                @if ($errors->has('emails.' . $n))
                                    <span class="form__helper">
                                        {{ $errors->first('emails.' . $n) }}
                                    </span>
                                @endif
                            </div>
                        @endforeach

                        <div class="form__group{{ $errors->has('message') ? ' has__danger' : '' }}">
                            <label class="form__label font--bold" for="message">Message (optional)</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form__item"></textarea>

                            @if ($errors->has('message'))
                                <span class="form__helper">
                                    {{ $errors->first('message') }}
                                </span>
                            @endif
                        </div>

                        <div class="form__group">
                            <button type="submit" class="btn btn--primary">Send</button>
                        </div>

                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
