@extends('adminlte::page')
@section('title')
    Update Trips
@endsection
@section('content_header')
    <h1 class="text-center text-uppercase">Update Trip</h1>
@endsection
@section('content')
 <!-- Booking Start -->
 <div class="container-xxl py-5">
    <div class="container">
        </div>
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img  class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('storage/img/blog/'. $trip->image1) }}" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-start">
                        <img  class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('storage/img/blog/'. $trip->image2) }}">
                    </div>
                    <div class="col-6 text-end">
                        <img  class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('storage/img/blog/'. $trip->image3) }}">
                    </div>
                    <div class="col-6 text-start">
                        <img   class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('storage/img/blog/'. $trip->image4) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 text-center">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                   <h1>{{ $trip->title }}</h1>
                   <h4>{{ $trip->description }}</h4>
                   {{ $trip->prix }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->



@endsection
