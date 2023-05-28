@extends('layouts.app')
@section('title')
    home
@endsection
@section('content')

  @include('include.heosection')
  
  @include('include.listTrip')
    @include('include.contact')
@endsection