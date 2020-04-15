@component ('listings.partials._base_listing', compact('listing'))
    @slot('links')
        <div>
            <a href="#"><i class="lunacon lunacon-thumbs-up"></i></a> &nbsp;
            <a href="#"><i class="lunacon lunacon-code-fork"></i></a> &nbsp;
            <a href="#"><i class="lunacon lunacon-facebook"></i></a> &nbsp;
            <a href="#"><i class="lunacon lunacon-heart"></i></a>
        </div>
        <div>
            <a href="#" class="btn btn--sm btn--primary">VIEW</a>
        </div>
    @endslot
@endcomponent





