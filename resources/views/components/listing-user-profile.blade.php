
<div class="user__profile shadow--4 flex flex--column flex--center">
    <div class="user__profile__avatar avatar avatar--lg">
        <img src="{{ $listing->user->avatar }}" alt="{{ $listing->user->name }}">
    </div>
    <h3>{{$listing->user->name}}</h3>
    <i class="lunacon lunacon--size-x3 lunacon-message"></i>
    <br>
    @if($listing->user->show_phone)
        <a href="tel:{{$listing->user->phone}}">{{ $listing->user->phone }}</a>
    @endif
    @if($listing->user->show_email)
        <a href="mailto:{{$listing->user->email}}">{{ $listing->user->email }}</a>
    @endif

</div>

