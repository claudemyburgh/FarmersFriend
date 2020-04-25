<nav class="nav nav--fixed shadow--1">
    <div class="nav__wrapper">
        <div class="nav__brand">
            <a href="{{ route('welcome', $area) }}">
                <img src="{{ asset('img/ff-logo.svg') }}" class="nav__brand__logo" alt="{{ config('app.name') }}">
            </a>
        </div>
        <div class="nav__navicon"></div>
        <div class="nav__links__wrapper nav__links--right">
            <ul class="nav__links">
                <li class="nav__links__item {{ set_active('/*/') }}"><a href="{{ url('/') }}">{{ __('Listings') }}</a></li>
{{--                <li class="nav__links__item {{ set_active('areas') }}"><a href="{{ route('areas') }}">{{ __('Areas') }}</a></li>--}}
{{--                <li class="nav__links__item {{ set_active('*/categories') }}"><a href="{{ route('category.index', [$area]) }}">{{ __('Listings') }}</a></li>--}}
                @guest
                    <li class="nav__links__item {{ set_active('login') }}"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li class="nav__links__item {{ set_active('register') }}"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    <li class="nav__links__button">
                        <a href="{{ route('listings.create', [$area]) }}" class="btn btn--primary-gradient text--white">Create a Listing</a>
                    </li>

                @else
                    <li class="nav__links__item nav__links__item--dropdown">
                        <a href="#"> <img class="avatar__nav"  src="{{ Auth::user()->avatar(30) }}" alt="Avater"> {{ Auth::user()->name }}</a>
                        <ul class="nav__links">
                            <li class="nav__links__item">
                                <a href="{{ route('dashboard.index') }}"> <i class="lunacom lunacon-dashboard mr-2"></i> {{__("Dashboard")}}</a>
                            </li>
                            <li class="nav__links__item nav__devider"></li>
                            <li class="nav__links__item">
                                <a href="{{ route('listings.published.index', [$area]) }}"> <i class="lunacom lunacon-file mr-2"></i>  Published listings ({{ $publishedListingsCount }})</a>
                            </li>
                            <li class="nav__links__item">
                                <a href="{{ route('listings.unpublished.index', [$area]) }}"> <i class="lunacom lunacon-file-delete mr-2"></i> Unpublished listings ({{ $unpublishedListingsCount }})</a>
                            </li>
                            <li class="nav__links__item nav__devider"></li>
                            <li class="nav__links__item">
                                <a href="{{ route('listings.favourites.index', [$area]) }}"><i class="lunacom lunacon-heart mr-2"></i>  Favourited listings</a>
                            </li>

                            <li class="nav__links__item">
                                <a href="{{ route('listings.viewed.index', [$area]) }}"><i class="lunacom lunacon-list mr-2"></i>  Recently viewed listings</a>
                            </li>

                            <li class="nav__links__item nav__devider"></li>

                            <li class="nav__links__item">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="lunacom lunacon-keys-hole mr-2"></i> {{ __('Logout') }}</a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
