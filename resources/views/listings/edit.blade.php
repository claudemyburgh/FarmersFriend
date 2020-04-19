@extends('layouts.app')

@section('title', 'Edit Listing')

@section('content')
<div class="wrapper">
    <div class="row flex justify--center z-100">
        <div class="md-col-6">
            <notify-published  :area="{{ $area }}" ></notify-published>
            <drop-zone
                :object="{{ $listing->getMedia('listing') }}"
                photo="listing"
                upload="{{ route('api.listing.image.upload', [$listing])  }}"
                remove="api/listing">
            </drop-zone>
            <edit-listing :area="{{ $area }}" :listing-object="{{ $listing }}"></edit-listing>
        </div>
    </div>
</div>
@endsection
