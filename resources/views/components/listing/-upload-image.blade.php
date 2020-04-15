<div {{ $attributes->merge(['class' => 'panel shadow--1']) }}>

    <div class="panel__header">Image Upload</div>
    @if($listing->getFirstMediaUrl('listing', 'card'))
        <img class="panel__img" src="{{ $listing->getFirstMediaUrl('listing', 'card') }}" alt="Image">
    @endif
    <div class="panel__body">
        <form action="{{ route('listings.upload', [$area, $listing]) }}" method="POST" enctype="multipart/form-data"    >
            @csrf
            <div class="form__group @error('file') has__danger  @enderror">
                <input id="file" type="file" class="form__item" name="file">
                @error('file')
                    <div class="form__helper">
                       {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form__group">
                <button type="submit" class="btn btn--primary-gradient">Upload</button>
            </div>
        </form>
    </div>

</div>
