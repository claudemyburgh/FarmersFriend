    <div class="form__group{{ $errors->has('area_id') ? ' has__danger' : '' }}">
        <label for="area" class="form__label font--bold">Area</label>
        <select name="area_id" id="area" class="form__item">
            @foreach($areas as $country)
                <optgroup label="{{ $country->name }}">
                    @foreach ($country->children as $state)
                        <optgroup label="{{ $state->name }}">
                            @foreach ($state->children as $city)
                                @if (
                                    isset($listing) && $listing->area->id == $city->id ||
                                    !isset($listing) && $area->id == $city->id && !old('area_id') ||
                                    old('area_id') == $city->id
                                )
                                    <option value="{{ $city->id }}" selected="selected">{{ $city->name }}</option>
                                @else
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        @if ($errors->has('area_id'))
            <span class="form__helper">
                {{ $errors->first('area_id') }}
            </span>
        @endif
    </div>
