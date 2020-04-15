@component('mail::message')
# {{ $user->name }}

Your email was successfully send.


@slot('subcopy')

    @component('mail::button', ['url' => 'https://facebook.com'])
        like us on Facebook
    @endcomponent

@endslot

Thanks,<br>
{{ config('app.name') }}
@endcomponent
