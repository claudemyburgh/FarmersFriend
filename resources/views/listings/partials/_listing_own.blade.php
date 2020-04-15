@component ('listings.partials._base_listing', compact('listing'))
    @slot('links')
        <div class="btn__group">
            <br>
            <a class="btn btn--sm btn--info" href="{{ route('listings.edit', [$area, $listing]) }}">Edit</a>
            <a class="btn btn--sm btn--danger" href="#" onclick="event.preventDefault(); document.getElementById('listings-destroy-form-{{ $listing->id }}').submit();">Remove</a>
        </div>

        <form action="{{ route('listings.destroy', [$area, $listing]) }}" method="post" id="listings-destroy-form-{{ $listing->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    @endslot
@endcomponent



