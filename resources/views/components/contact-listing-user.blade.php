<div>
    <form action="{{ route('listings.contact.store', [$area, $listing]) }}" method="post">
        <div class="form__group{{ $errors->has('message') ? ' has__danger' : '' }}">
            <label for="message" class="form__label font--bold">Message</label>
            <textarea name="message" id="message" cols="30" rows="5" class="form__item"></textarea>

            @if ($errors->has('message'))
                <span class="form__helper">
                    {{ $errors->first('message') }}
                </span>
            @endif
        </div>
        <div class="form__group flex justify--between flex--center">
            <button type="submit" class="btn btn--primary-gradient">Send</button>
            <span class="form__helper">This will email {{ $listing->user->name }} and they'll be able to reply directly to you by email.</span>
        </div>

        {{ csrf_field() }}
    </form>
</div>
