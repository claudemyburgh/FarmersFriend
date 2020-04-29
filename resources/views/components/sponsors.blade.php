<div  {{ $attributes->merge(['class' => 'py-9 mt-9 sponsors']) }}>
    <div class="wrapper">
        <div class="row flex justify--center flex--center">
            <div class="md-col-6 mb-7">
                <h1 class="sponsors__title flex flex--row justify--center flex--center">SPONSORS</h1>
            </div>
        </div>

        <div class="row flex justify--center flex--center">
            @foreach($sponsors as $sponsor)
                <div class="xs-col-4 md-col-3 m-4">
                    <a href="{{ $sponsor['url'] }}" target="_blank">
                        <img class="sponsors__img sponsors__hover" src="{{ asset('img/sponsors/')}}/{{$sponsor['img'] }}" alt="{{ $sponsor['name'] . ' ' . $sponsor['alt'] }}">
                    </a>
                </div>
            @endforeach
        </div>
{{--        <div class="row flex justify--center flex--center">--}}
{{--            <div class="md-col-6 mt-7">--}}
{{--                <h3 class="sponsors__title flex flex--row justify--center flex--center"><a href="#">BECOME A SPONSORS</a></h3>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
