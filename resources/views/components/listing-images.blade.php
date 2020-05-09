<div  {{ $attributes->merge(['class' => 'mb-4']) }}>

    @if($count)
        <div class="ig">

            @if($count === 1)
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[0]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[0]->getFullUrl('thumb') }}" alt="">
                    </a>
            @elseif($count === 2)
                <div class="ig--1/2">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[0]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[0]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/2">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[1]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[1]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
            @elseif($count === 3)
                <div class="ig--1/3">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[0]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[0]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/3">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[1]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[1]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/3">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[2]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[2]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
            @elseif($count === 4)
                <div class="ig--1/1">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[0]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[0]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/3">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[1]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[1]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/3">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[2]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[2]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/3">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[3]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[3]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>

            @elseif($count >= 5)
                <div class="ig--1/2">
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[0]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                        <img src="{{ $media[0]->getFullUrl('thumb') }}" alt="">
                    </a>
                </div>
                <div class="ig--1/2">
                    <div class="ig--1/2">
                        <a data-fslightbox="listing" data-type="image" href="{{ $media[1]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                            <img src="{{ $media[1]->getFullUrl('thumb') }}" alt="">
                        </a>
                    </div>
                    <div class="ig--1/2">
                        <a data-fslightbox="listing" data-type="image" href="{{ $media[2]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                            <img src="{{ $media[2]->getFullUrl('thumb') }}" alt="">
                        </a>
                    </div>
                    <div class="ig--1/2">
                        <a data-fslightbox="listing" data-type="image" href="{{ $media[3]->getFullUrl('card') }}" class="ig__item  ig--larger ig__icon" >
                            <img src="{{ $media[3]->getFullUrl('thumb') }}" alt="">
                        </a>
                    </div>
                    <div class="ig--1/2">
                        <a data-fslightbox="listing" data-type="image" href="{{ $media[4]->getFullUrl('card') }}"
                           class="ig__item  ig--larger @if($count > 5)  ig__data ig--active @endif"  @if($count > 5)  data-text="+{{ $count - 5 }}" @endif  >
                            <img src="{{ $media[4]->getFullUrl('thumb') }}" alt="">
                        </a>
                    </div>
                </div>

                @for ($i = 5; $i < $count; $i++)
                    <a data-fslightbox="listing" data-type="image" href="{{ $media[$i]->getFullUrl('card') }}"
                       class="hide"></a>
                @endfor
            @endif
        </div>
    @endif

</div>



