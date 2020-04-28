@component('mail::message')
    # Hello, {{ $user->name }}

    Your Facebook Account was linked.


    @include('email.social._linked-accounts')

    @component('mail::button', ['url' => config('app.url')])
        Farmer's Friend
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
