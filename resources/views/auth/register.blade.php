@extends('master.app')

@section('title')
   Registration
@endsection
@section('breadcrump')
    Registration
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
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add User</h3>
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
                                    <label>Name</label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" name="name" placeholder="Name">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input type="password"  class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="Password">
                                    @error('password_confirmation')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Role</label><br>
                                    <div class="form-check" style="float: left;margin-left:10px">
                                        <input class="form-check-input" type="radio"  name="role" value="Admin" id="admin" checked style="margin-top:7px ">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Admin
                                        </label>
                                    </div>
                                    {{-- <div class="form-check" style="float: left;margin-left:10px">
                                        <input class="form-check-input" type="radio" name="role" value="Doctor" id="doctor"  style="margin-top:7px ">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        Doctor
                                        </label>
                                    </div>
                                    <div class="form-check" style="float: left;margin-left:10px">
                                        <input class="form-check-input" type="radio" name="role" value="Patient" id="patient"  style="margin-top:7px ">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Patient
                                        </label> --}}
                                    </div>
                                    @error('role')
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
