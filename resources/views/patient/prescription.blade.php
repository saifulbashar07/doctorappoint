@extends('master.app')

@section('title')
    {{ $title }}
@endsection
@section('breadcrump')
    Last Prescription
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
                                    <th class="text-center">Doctor Name</th>
                                    <th class="text-center">File</th>
                                    <th class="text-center">Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="text-center">{{ $file->doctor->name }}</td>
                                    <td class="text-center"><img src="{{ asset($file->file) }}" alt="File" style="width: 200px"></td>
                                    <td class="text-center">{{ date('d-M-Y',strtotime($file->date)) }}</td>                                  
                                  </tr>                               
                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection