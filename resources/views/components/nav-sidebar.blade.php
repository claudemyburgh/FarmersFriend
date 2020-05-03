<div>

    <div class="well">
        <a href="{{ route('listings.create', [$area]) }}" class="btn btn--block btn--lg btn--primary-gradient">{{ __('Create Listing') }}</a>
    </div>

    <ul class="list">
        <li class="list__item flex justify--between {{ set_active($area->slug . '/dashboard/profile', ' bg--secondary-light') }}">
            <a href="{{ route('dashboard.profile.index', [$area]) }}">{{ __('Profile') }} </a>
        </li>
        <li class="list__item flex justify--between {{ set_active($area->slug . '/dashboard/password', ' bg--secondary-light') }}">
            <a href="{{ route('dashboard.password.index', [$area]) }}">Change Password </a>
        </li>
    </ul>

    <ul class="list">
        <li class="list__item flex justify--between {{ set_active($area->slug . '/dashboard/listings/published', ' bg--secondary-light') }}">
            <a href="{{ route('listings.published.index', [$area]) }}">{{ __('Published Listings') }} </a>({{ $publishedListingsCount }})
        </li>
        <li class="list__item flex justify--between {{ set_active($area->slug . '/dashboard/listings/unpublished', ' bg--secondary-light') }}">
            <a href="{{ route('listings.unpublished.index', [$area]) }}">{{ __('Unpublished Viewed') }} </a>({{ $unpublishedListingsCount }})
        </li>
    </ul>


    <ul class="list">
        <li class="list__item flex justify--between {{ set_active($area->slug . '/dashboard/listings/favourites', ' bg--secondary-light') }}">
            <a href="{{ route('listings.favourites.index', [$area]) }}">{{ __('Favourite Listings') }}</a>
        </li>
        <li class="list__item flex justify--between {{ set_active($area->slug . '/dashboard/listings/viewed', ' bg--secondary-light') }}">
            <a href="{{ route('listings.viewed.index', [$area]) }}">{{ __('Recently Viewed') }}</a>
        </li>
    </ul>

</div>
