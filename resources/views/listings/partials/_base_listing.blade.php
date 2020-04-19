<section class="listing flex animate">
    @if($listing->hasMedia('listing'))
    <picture class="listing__pic shadow--6">
{{--        <source media="(min-width: 600px)" srcset="https://picsum.photos/seed/picsum/400/230">--}}
        <img class="listing__img" src="{{$listing->getFirstMediaUrl('listing', 'thumb_big')}}" alt="">
    </picture>
    @else
        <picture  class="listing__pic shadow--6">
            <source media="(min-width: 600px)" srcset="http://lorempixel.com/400/200">
            <img class="listing__img" src="http://lorempixel.com/400/200" alt="No Image">
        </picture>
    @endif
    <article class="listing__article shadow--4 flex flex--grow">
        <div class="avatar avatar__sm listing__avatar">
            <img src="{{ $listing->user->avatar }}" alt="">
        </div>
        <header class="listing__header ">
            <a class="ellipsis block" href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a>
        </header>
        <div class="listing__footer flex flex--row justify--between">
            {{ $links ?? null }}
        </div>
    </article>
</section>
