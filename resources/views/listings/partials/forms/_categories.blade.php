<div class="form__group{{ $errors->has('category_id') ? ' has__danger' : '' }}">
    <label for="category" class="form__label font--bold">Category</label>
    <select name="category_id" id="category" class="form__item"{{ isset($listing) && $listing->isLive() ? ' disabled="disabled"' : '' }}>
        @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $child)
                    @if (isset($listing) && $listing->category_id == $child->id || old('category_id') == $child->id)
                        <option value="{{ $child->id }}" selected="selected">{{ $child->name }} (R{{ number_format($child->price, 2) }})</option>
                    @else
                        <option value="{{ $child->id }}">{{ $child->name }} (R{{ number_format($child->price, 2) }})</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>

    @if ($errors->has('category_id'))
        <span class="form__helper">
            {{ $errors->first('category_id') }}
        </span>
    @endif
</div>
