@extends('layouts.default')

@section('content')
<!-- Main Wrapper Start Here -->
<div class="wrapper">
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Partnerships</li>
            </ol>
        </div>
    </div>
</div>
<!-- Main Wrapper End Here -->

<div class="container">
    <h3 class="mb-4 mt-4">{{ __('partnerships.title') }}</h3>
    <ul>
        @foreach($partnerships as $partnership)
        <li style="margin-bottom: 20px;">
            <div class="row">
                <div class="col-md-1 col-xs-3">
                    <img src="{{ asset('storage/' . $partnership->image) }}" alt="{{ $partnership->name }}" class="img-fluid" style="width: 100%;">
                </div>
                <div class="col-md-3 col-xs-9" style="padding-top: 10px;">
                    <h5>{{ $partnership->name }}</h5>
                    <!-- email -->
                    <p>
                        <a href="mailto:{{ $partnership->email }}">
                            <i class="fa fa-envelope fa-fw"></i> {{ $partnership->email }}
                        </a>
                    </p>
                    <p><i class="fa fa-map-marker fa-fw"></i> {{ $partnership->city }}<br>
                        @if(!empty($partnership->address))
                        <i class="fa fa-map-marker fa-fw"></i> {{ $partnership->address }}
                        @endif
                    </p>
                    <p><i class="fa fa-phone fa-fw"></i> {{ $partnership->phone }}</p>
                    <p>{{ $partnership->description }}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
