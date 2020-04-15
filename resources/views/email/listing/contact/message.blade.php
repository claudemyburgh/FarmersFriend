@component('mail::message')

## Hi {{ $listing->user->name }},


{{ $sender->name }} has contacted you about your listing, <a href="{{ route('listings.show', [$listing->area, $listing]) }}">{{ $listing->title }}</a>.


{!! nl2br(e($body)) !!}<br>


Reply directly to this email to get back to them.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
