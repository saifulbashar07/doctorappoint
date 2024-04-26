@extends('master.app')

@section('title')
   {{ $title }}
@endsection
@section('breadcrump')
  Appointment
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
<form method="POST" action="{{ route('patient.appointment.store') }}">
    @csrf

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Patient Info</h3>
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
                                    <input type="text" required name="date" value="{{ date('d-m-Y') }}" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
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
                                    <input type="text" value="{{ old('name') }}"  class="form-control" name="name" placeholder="name">
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
                                    <input type="text" value="{{ old('phone') }}"  class="form-control" name="phone" placeholder="phone">
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="text" value="{{ old('age') }}"  class="form-control" name="age" placeholder="age">
                                    @error('age')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" value="{{ old('address') }}"  class="form-control" name="address" placeholder="address">
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
                                    <input type="email"  class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password"  class="form-control" value="{{ old('password') }}" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Appointment Book</label>
                                    <input type="datetime-local" value="{{ old('timing') }}"  class="form-control" name="timing" placeholder="Chamber Timing" >
                                    @error('timing')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Prescription Details</label>
                                    <textarea name="description" id="summernote"  class="form-control">{{ old('description') }}</textarea>
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
