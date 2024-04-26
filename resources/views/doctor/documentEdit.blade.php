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
<form action="{{ route('doctor.document.edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h3>Update Patient Document</h3>
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
                              <input type="text" required name="date" value="{{ $doctorFile->date }}" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                              <input type="hidden" required name="id" value="{{ $doctorFile->id }}" class="form-control">
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
                                  <br>
                                  <img src="{{ asset($doctorFile->file) }}" alt="File" style="width: 100px">
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
                                    <option value="{{ $patient->id }}" @if($doctorFile->patient_id == $patient->id) selected='selected' @endif;>{{ $patient->name }}</option>
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