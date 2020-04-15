
@component('mail::message')

{{ $sender->name }} has shared a listing, <a href="{{ route('listings.show', [$listing->area, $listing]) }}">{{ $listing->title }}</a>

@if ($body)

{!! nl2br(e($body)) !!}

@endif


Thanks,<br>
{{ config('app.name') }}
@endcomponent
