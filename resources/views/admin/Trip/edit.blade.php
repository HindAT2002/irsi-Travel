@extends('adminlte::page')
@section('title')
    Update Trips
@endsection
@section('content_header')
    <h1 class="text-center text-uppercase">Update Trip</h1>
@endsection
@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-8 mx-auto" >
            <div class="card my-3">
                <div class="card-header">
                    <div class="text-center text-uppercase">
                        <h3>Trips</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('trips.update', $trip->id) }}" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nbr_jour">Nombre de jours :</label>
                            <input type="number" class="form-control" id="nbr_jour" name="nbr_jour" value="{{ old('nbr_jour', $trip->nbr_jour) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="localisation">Localisation :</label>
                            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ old('localisation', $trip->localisation) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $trip->title) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $trip->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image1">Image 1 :</label>
                            <input type="file" class="form-control-file" id="image1" name="image1" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="image2">Image 2 :</label>
                            <input type="file" class="form-control-file" id="image2" name="image2" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="image3">Image 3 :</label>
                            <input type="file" class="form-control-file" id="image3" name="image3" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="image4">Image 4 :</label>
                            <input type="file" class="form-control-file" id="image4" name="image4" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="date">Date :</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $trip->date) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix :</label>
                            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $trip->prix) }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
