<div class="wrapper">
    <div class="row">
        <div class="col">
            @if (isset($category))
                <app-search category-id="{{ $category->id }}" :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></app-search>
            @else
                <app-search :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></app-search>
            @endif
        </div>
    </div>
</div>
