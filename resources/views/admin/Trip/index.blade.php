@extends('adminlte::page')
@section('title')
    List of Trips
@endsection
@section('content_header')
    <h1 class="text-center text-uppercase">List of Trips</h1>
@endsection
@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header">
                    <div class="text-center text-uppercase">
                        Trip
                    </div>
                </div>
                <div class="card-body">
                    <table id="my-table" class="table-bordered table-striped w-100">
                        <thead>
                            <th>
                                Id
                            </th>
                            <th>
                                about trip 
                            </th>
                            <th>
                                price
                            </th>
                            <th>
                                nbr jour
                            </th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($trips as $key=>$trip)
                            <tr>
                                <td>
                                    {{$key+=1}}
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card my-3">
                                                <div class="card-body" style="background-image: url({{ asset('storage/img/blog/'.$trip->image1) }}); background-size: cover; height: 200px;">
                                                    <h5 class="card-title text-center">{{ $trip->title }}</h5>
                                                </div>
                                                <div class="card-footer">
                                                    <p class="card-text">{{ $trip->description }} {{$trip->image1 }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $trip->prix }} $</td>
                                <td>{{ $trip->nbr_jour }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('trips.show',$trip->id)}}" class="btn btn-smm btn-warning">
                                         <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('trips.edit',$trip->id)}}" class="btn btn-smm btn-primary mx-2">
                                         <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('trips.destroy',$trip->id)}}">
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
                dom:'Bfrtip',
                button:[
                    'copy','excel','csv','pdf','print','colvis',
                ],
            });
        });
    </script>
    <script>
        if (session()->has('success')) {
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{session()->get('success')}}",
            showConfirmButton: false,
            timer: 2000
            })    
        }
    </script>
@endsection
