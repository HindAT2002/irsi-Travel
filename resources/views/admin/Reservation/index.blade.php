@extends('adminlte::page')
@section('title')
    List of reservation
@endsection
@section('content_header')
    <h1 class="text-center text-uppercase">List of reservation</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <div class="text-center text-uppercase">
                            Reservations
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="my-table" class="table-bordered table-striped w-100">
                            <thead>
                                <th>Id</th>
                                <th>Trip</th>
                                <th>User</th>
                                <th>Number of Places</th>
                                <th>Number of Children</th>
                                <th>Date</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$reservation->id_trip}}</td>
                                        <td>{{$reservation->id_user}}</td>
                                        <td>{{$reservation->nbr_place}}</td>
                                        <td>{{$reservation->nbr_enfant}}</td>
                                        <td>{{$reservation->date}}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route('reservations.show',$reservation->id)}}" class="btn btn-smm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{route('reservations.edit',$reservation->id)}}" class="btn btn-smm btn-primary mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('reservations.destroy',$reservation->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-smm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#my-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
                ]
            });
        });
    </script>
    <script>
        if (session().has('success')) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ session()->get('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>
@endsection
