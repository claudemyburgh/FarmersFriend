@if (env('APP_ENV') === 'local')
<div  {{ $attributes->merge(['class' => 'development bg--danger-gradient text--white']) }}>
    <div class="wrapper">
        <div class="row">
            <div class="md-col-12">
            <div class="py-4 font--larger text-align-center">
                THIS SITE IS IN DEVELOPMENT!
            </div>
            </div>
        </div>
    </div>
</div>
@endif

