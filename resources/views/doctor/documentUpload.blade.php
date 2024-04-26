@extends('master.app')

@section('title')
    {{ $title }}
@endsection
@section('breadcrump')
     Document
@endsection


@section('content')
@session('status')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
        
            {{ session('status') }} 
        
        </div>
    </div>
</div>
@endsession
<br>
<form action="{{ route('doctor.document.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h3>Upload Patient Document</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Date</label>
                              <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                              </div>
                              <input type="text" required name="date" value="{{ date('d-m-Y') }}" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                              @error('date')
                              <div class="text-danger">
                                  {{ $message }}
                              </div>
                              @enderror
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="form-group">
                                
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                  </div>
                                  @error('file')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Patient</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="patient_id">
                                <option value="">Select Patient</option>
                                @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach
                                </select>
                                @error('patient_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success" onclick="return refresh();"><i class="fas fa-check" id="checked"  style="font-size: 14px"></i><i id="refreshed" class="fas fa-spinner fa-spin" style="font-size: 14px;display:none"></i>&nbsp;Submit </button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </div>  
                </div>
              </div>
          </div> 
          <div class="row">
            <div class="col-lg-12 col-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Date</th>
                      <th class="text-center">Doctor</th>
                      <th class="text-center">Patient</th>
                      <th class="text-center">File</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($files as $data)   
                    <tr>
                      <td class="text-center">{{ $loop->iteration  }}</td>
                      <td class="text-center">{{ date('d-M-Y',strtotime($data->date)) }}</td>
                      <td class="text-center">{{ $data->doctor->name }}</td>
                      <td class="text-center">{{ $data->patient->name }}</td>
                      <td class="text-center"><img src="{{ asset($data->file) }}" alt="File" style="width: 100px"></td>
                     
                      {{-- <td class="text-center">{!! $data->description !!}</td> --}}
                      <td class="text-center">
                        {{-- <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a> --}}
                        <a style="margin: 2px 0px" class="btn btn-info btn-sm" href="{{ url('/doctor-file/'.$data->id.'/edit') }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a style="margin: 2px 0px" class="btn btn-danger btn-sm" href="{{ url('/doctor-file-delete/'.$data->id) }}" onclick="return confirm('Are you sure ?')" >
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
        {{-- <div class="col-md-4">
            <div class="form-group">
              <label>Multiple</label>
              <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
        </div> --}}
</form>
@endsection