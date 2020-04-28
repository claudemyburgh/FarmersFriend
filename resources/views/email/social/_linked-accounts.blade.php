@if($user->social->count() > 1)
    ### You have the following {{ $user->social->count() }} social account linked with us.
    @foreach($user->social as $social)
        * {{ config("social.services.{$social->service}.name") }}
    @endforeach
@endif
