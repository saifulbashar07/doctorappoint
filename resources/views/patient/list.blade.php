@extends('master.app')

@section('title')
    {{ $title }}
@endsection
@section('breadcrump')
    Patient List
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
                                  <th class="text-center">Name</th>
                                  <th class="text-center">Phone</th>
                                  <th class="text-center">Age</th>
                                  <th class="text-center">Address</th>
                                  <th class="text-center">Email</th>
                                  <th class="text-center"> Timimg</th>
                                  <th class="text-center">Description</th>
                                  <th class="text-center">Date</th>
                                  {{-- <th class="text-center">Action</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($patients as $data)   
                                <tr>
                                  <td class="text-center">{{ $loop->iteration  }}</td>
                                  <td class="text-center">{{ $data->name }}</td>
                                  <td class="text-center">{{ $data->phone }}</td>
                                  <td class="text-center">{{ $data->age }}</td>
                                  <td class="text-center">{{ $data->address }}</td>
                                  <td class="text-center">{{ $data->email }}</td>
                                  <td class="text-center">{{ $data->timing }}</td>
                                  <td class="text-center">
                                    <a class="btn btn-success btn-sm" href="#"  data-toggle="modal" data-target="#modal-lg{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                    <div class="modal fade" id="modal-lg{{ $data->id }}">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Description</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body text-left">
                                              <p>{!! $data->description !!}</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-default">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </td>
                                  {{-- <td class="text-center">{!! $data->description !!}</td> --}}
                                  <td class="text-center">{{ date('d-M-Y',strtotime($data->date)) }}</td>
                                  {{-- <td class="text-center">
                                    
                                    <a style="margin: 2px 0px" class="btn btn-info btn-sm" href="{{ url('/doctor/'.$data->id.'/edit') }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a style="margin: 2px 0px" class="btn btn-danger btn-sm" href="{{ url('/doctor-delete/'.$data->id) }}" onclick="return confirm('Are you sure ?')" >
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td> --}}
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