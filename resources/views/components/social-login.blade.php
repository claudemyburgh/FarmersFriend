<div  {{ $attributes->merge(['class' => 'panel shadow--1']) }}>
    <div class="panel__body">
        <div class="flex justify--evenly">
            <a href="{{ url('/login/github') }}" class="btn btn--gh-gradient text--white mb-3"><i class="lunacon lunacon-github-round"></i> GITHUB  </a>

            <a href="{{ url('/login/google') }}" class="btn btn--white-gradient text--black mb-3">
                <img class="btn__google__icon" width="18" src="{{asset('img/icons/g.svg')}}" alt=""> GOOGLE  </a>


{{--            <a href="{{ url('/login/facebook') }}" class="btn btn--fb-gradient text--white mb-3">--}}
{{--                <i class="lunacon lunacon-facebook"></i> FACEBOOK  </a>--}}
        </div>
    </div>
</div>
