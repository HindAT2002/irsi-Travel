@extends('adminlte::page')
@section('title')
    home
@endsection
@section('content_header')
    dashboard    
@endsection
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Trip::count() }}</h3>
                    <p>Trips</p>
                </div>
                <div class="icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <a href="{{URL::to('/trips')}}" class="small-box-footer"> 
                    view more   <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ \App\Models\Reservation::count() }}</h3>
                    <p>Reservations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="{{URL::to('/reservations')}}" class="small-box-footer"> 
                    view more   <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\User::count() }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{URL::to('/users')}}" class="small-box-footer"> 
                    View more <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection