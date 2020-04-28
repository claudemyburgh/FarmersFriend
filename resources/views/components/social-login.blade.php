<div  {{ $attributes->merge(['class' => 'panel shadow--1']) }}>
    <div class="panel__body">
        <div class="flex justify--evenly">
            <a href="{{ url('/login/github') }}" class="btn btn--white-gradient text--black"><i class="lunacon lunacon-github-round"></i> GITHUB  </a>
            <a href="{{ url('/login/google') }}" class="btn btn--white-gradient text--black">
                <img width="18" src="{{asset('img/icons/g.svg')}}" alt=""> GOOGLE  </a>
        </div>
    </div>
</div>
