@extends('adminlte::page')
@section('title', 'List of Users')

@section('content_header')
    <h1 class="text-center text-uppercase">List of Users</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <div class="text-center text-uppercase">
                            Users
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="my-table" class="table-bordered table-striped w-100">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($users as $key=>$user)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address}}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route('users.show',$user->id)}}" class="btn btn-smm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-smm btn-primary mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('users.destroy',$user->id)}}" method="POST">
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
