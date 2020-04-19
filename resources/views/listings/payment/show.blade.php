@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center">
        <div class="md-col-6">
            <blockquote class="blockquote blockquote--info shadow--2">
                <header class="blockquote__header">Notic</header>
                <aside class="blockquote__body">
                    Please make sure that what <strong><mark>{{ $listing->category->name }}</mark></strong> is the category that you seleceted. The <strong>Category</strong> can not be change when this listing go's live.
                </aside>
                <footer class="blockquote__footer bg--info-light flex justify--end">
                    <button class="btn btn--info" onclick="window.history.back()">GO BACK</button>
                </footer>
            </blockquote>

            <div class="panel shadow--2">
                <div class="panel__header">Pay for your listing</div>
                <div class="panel__body">

                    @if ($listing->cost() == 0)
                        <form action="{{ route('listings.payment.update', [$area, $listing]) }}" method="post">
                            <p>There's nothing for you to pay.</p>
                            <button type="submit" class="btn btn--primary">Complete</button>

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        </form>
                    @else
                        <p>Total cost: £{{ number_format($listing->cost(), 2) }}</p>
{{--                        <payment-form></payment-form>--}}
                        <form action="{{ route('listings.payment.update', [$area, $listing]) }}" method="post">

                            <button type="submit" class="btn btn--primary">Complete</button>

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
