@extends('master.app')

@section('title')
   {{ $title }}
@endsection
@section('breadcrump')
  Medicine
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
<form method="POST" action="{{ route('medicine.edit') }}">
    @csrf
    @method('PATCH')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Medicine Info</h3>
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
                                    <input type="text" required name="date" value="{{ $medicine->date }}" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                                    <input type="hidden" required name="id" value="{{ $medicine->id }}">
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
                                    <input type="text" value="{{ $medicine->name }}"  class="form-control" name="name" placeholder="name">
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Group</label>
                                    <input type="text" value="{{ $medicine->group }}"  class="form-control" name="group" placeholder="group">
                                    @error('group')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" id="summernote"  class="form-control">{!! $medicine->description !!}</textarea>
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
