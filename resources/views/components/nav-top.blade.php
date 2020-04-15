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
                <li class="nav__links__item {{ set_active('areas') }}"><a href="{{ route('areas') }}">{{ __('Areas') }}</a></li>
{{--                <li class="nav__links__item {{ set_active('*/categories') }}"><a href="{{ route('category.index', [$area]) }}">{{ __('Listings') }}</a></li>--}}
                @guest
                    <li class="nav__links__item {{ set_active('login') }}"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li class="nav__links__item {{ set_active('register') }}"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>

                @else
                    <li class="nav__links__item nav__links__item--dropdown">
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul class="nav__links">
                            <li class="nav__links__item nav__links__item--dropdown">
                                <a href="#">{{__("Dashboard")}}</a>
                                <ul class="nav__links left">
                                    <li class="nav__links__item"><a href="{{ route('listings.published.index', [$area]) }}">Published listings ({{ $publishedListingsCount }})</a></li>
                                    <li class="nav__links__item"><a href="{{ route('listings.unpublished.index', [$area]) }}">Unpublished listings ({{ $unpublishedListingsCount }})</a></li>
                                </ul>
                            </li>

                            <li class="nav__links__item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
                <li class="nav__links__button">
                    <a href="{{ route('listings.create', [$area]) }}" class="btn btn--primary-gradient text--white">Create a Listing</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
