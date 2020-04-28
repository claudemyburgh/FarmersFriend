<div  {{ $attributes->merge(['class' => 'panel shadow--1']) }}>
    <div class="panel__body">
        <div class="flex flex--grow">
            <a href="{{ url('/login/github') }}" class="btn btn--block btn--white-gradient text--black"><i class="lunacon lunacon-github-round"></i> GITHUB  </a>
{{--            <a href="{{ url('/login/github') }}" class="btn btn--white-gradient text--black"><i class="lunacon lunacon-google-plus"></i> GOOGLE  </a>--}}
        </div>
    </div>
</div>
