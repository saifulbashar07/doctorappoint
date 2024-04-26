@extends('master.app')

@section('title')
    {{ $title }}
@endsection
@section('breadcrump')
    User List
@endsection

@section('content')

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>&nbsp;</h3>
                    @session('status')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                            
                                {{ session('status') }} 
                            
                            </div>
                        </div>
                    </div>
                    @endsession
                </div>
                <div class="card-body">                       
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">Role</th>
                                  <th class="text-center">Name</th>
                                  <th class="text-center">Email</th>
                                  <th class="text-center">Date</th>
                                  <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)   
                                <tr>
                                  <td class="text-center">{{ $loop->iteration  }}</td>
                                  <td class="text-center">{{ $user->role }}</td>
                                  <td class="text-center">{{ $user->name }}</td>
                                  <td class="text-center">{{ $user->email }}</td>
                                  <td class="text-center">{{ date('d-M-Y',strtotime($user->date)) }}</td>
                                  <td class="text-center">
                                    {{-- <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a> --}}
                                    <a class="btn btn-info btn-sm" href="{{ url('/user/'.$user->id.'/edit') }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/user-delete/'.$user->id) }}" onclick="return confirm('Are you sure ?')" >
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                                </tr>
                               
                                @endforeach
                                </tbody>
                                {{-- <tfoot>
                                <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr>
                                </tfoot> --}}
                              </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection