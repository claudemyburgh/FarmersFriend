@extends('layouts.app')

@section('title', $listing->title)

@section('content')
<div class="wrapper">
    <div class="row flex">
        <div class="md-col-3 ">
            <div class="nav__sidebar__sticky mb-4">
                @if (Auth::check())
                    <ul class="list">
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
                @endif
                <div class="bg--primary p-4 text--primary-light r-2 shadow--1">
                    <h2>Lorem ipsum dolor.</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, molestias!
                    </p>
                </div>
            </div>
        </div>
        <div class="md-col-6">

            @if($listing->images()->count())
            <div class="splide panel shadow--1">
                <div class="splide__track">
                    <div class="splide__list">
                        @foreach($listing->images() as $image)
                            <img class="splide__list" src="{{  $image->getFullUrl('thumb_big') }}" alt="slide">
                        @endforeach

                    </div>
                </div>
            </div>
            @endif

            <div class="panel shadow--1">
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
