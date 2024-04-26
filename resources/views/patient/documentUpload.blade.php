@extends('master.app')

@section('title')
    {{ $title }}
@endsection
@section('breadcrump')
    Patient Document
@endsection

@section('content')
<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Date</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" value="{{ date('d-m-Y') }}" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Image</label>
                <div class="form-group">
                 
                  <input type="file"  class="form-control" >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Minimal</label>
                <select class="form-control select2bs4" style="width: 100%;">
                <option selected="selected">Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
                </select>
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