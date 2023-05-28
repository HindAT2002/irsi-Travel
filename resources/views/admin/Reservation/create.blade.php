@extends('adminlte::page')
@section('title')
    ADD reservation
@endsection
@section('content_header')
    <h1 class="text-center text-uppercase">Add reservation</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        <div class="text-center text-uppercase">
                            <h3>Reservations</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservations.store') }}" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="trip">Trip:</label>
                                <select class="form-control" id="trip" name="trip_id" required>
                                    @foreach ($trips as $trip)
                                        <option value="{{ $trip->id }}">{{ $trip->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user">User:</label>
                                <select class="form-control" id="user" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nbr_place">Number of Places:</label>
                                <input type="number" class="form-control" id="nbr_place" name="nbr_place" required>
                            </div>
                            <div class="form-group">
                                <label for="nbr_enfant">Number of Children:</label>
                                <input type="number" class="form-control" id="nbr_enfant" name="nbr_enfant" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Reservation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
