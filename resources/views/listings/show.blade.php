@extends('layouts.app')

@section('title', $listing->title)

@section('content')
<div class="wrapper">
    <div class="row flex">
        @if (Auth::check())
            <div class="md-col-3 ">
                <ul class="list nav__sidebar__sticky">
                    <li class="list__item"><a href="{{ route('listings.share.index', [$area, $listing]) }}">Email to a friend</a></li>
                    @if (!$listing->favouritedBy(Auth::user()))
                        <li class="list__item">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('listings-favourite-form').submit();">Add to favourites</a>

                            <form action="{{ route('listings.favourites.store', [$area, $listing]) }}" method="post" id="listings-favourite-form" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        @endif
        <div class="{{ Auth::check() ? 'md-col-6' : 'md-col-9' }}">

            <div class="panel shadow--1">
                @if($listing->getFirstMediaUrl('listing', 'card'))
                    <img class="panel__img" src="{{ $listing->getFirstMediaUrl('listing', 'card') }}" alt="Image">
                @endif
                <div class="panel__body">
                    <h2>{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></h2>

                    {!! nl2br(e($listing->body)) !!}
                    <hr>
                    <p>Viewed {{ $listing->views() }} times</p>
                </div>
            </div>

            <div class="panel shadow--1">
                <div class="panel__header">
                    Contact {{ $listing->user->name }}
                </div>
                <div class="panel__body">
                    @if (Auth::guest())
                        <p><a href="/register">Sign up</a> for an account or <a href="/login">sign in</a> to contact listing owners.</p>
                    @else
                        <contact-listing-user :listing="{{$listing}}" :area="{{ $area }}"></contact-listing-user>
                    @endif
                </div>
            </div>
        </div>
        <aside class="md-col-3">
            <x-listing-user-profile :listing="$listing"></x-listing-user-profile>
        </aside>
    </div>
</div>
@endsection
