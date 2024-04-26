@extends('master.app')

@section('title')
   {{ $title }}
@endsection
@section('breadcrump')
  Doctor
@endsection

@section('content')

@session('status')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
        
            {{ session('status') }} 
        
        </div>
    </div>
</div>
@endsession
<br>
<form method="POST" action="{{ route('doctor.edit') }}">
    @csrf
    @method('PATCH')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Doctor Info</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" required name="date" value="{{ $doctor->date }}" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                    <input type="hidden" required name="id" value="{{ $doctor->id }}">
                                    @error('date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ $doctor->name }}"  class="form-control" name="name" placeholder="name">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" value="{{ $doctor->phone }}"  class="form-control" name="phone" placeholder="phone">
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" value="{{ $doctor->address }}"  class="form-control" name="address" placeholder="address">
                                    @error('address')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  class="form-control" value="{{ $doctor->email }}" name="email" placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Specialization</label>
                                    <input type="text" value="{{ $doctor->speciality }}"  class="form-control" name="speciality" placeholder="Specialization">
                                    @error('speciality')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Chamber Timing</label>
                                    <input type="text" value="{{ $doctor->timing }}"  class="form-control" name="timing" placeholder="Chamber Timing">
                                    @error('timing')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Max Patient in a Day</label>
                                    <input type="text" value="{{ $doctor->patient_per_day }}"  class="form-control" name="patient_per_day" placeholder="Max No of patient">
                                    @error('patient_per_day')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="summernote"  class="form-control">{!! $doctor->description !!}</textarea>
                                    @error('description')
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
    </div> 
</form>
@endsection
