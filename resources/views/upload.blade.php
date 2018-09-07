@extends('layouts.master')
@section('content')
<!-- /.row -->
<div class="row">
     <div class="col-lg-12">
         <h4 class="page-header">Upload document</h4>
     </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="{{ URL::to('/store') }}" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <div class="form-group">
                                <label for="filedesc">File Description</label>
                                <textarea class="form-control{{ $errors->has('filedesc') ? ' is-invalid' : '' }}" name="filedesc" required>{{ old('filedesc') }}</textarea>
                                @if($errors->has('filedesc'))
                                    <span class="invalid-feedback" role="alert" style="color: #ff0000">
                                        <strong>{{ $errors->first('filedesc') }}</strong>
                                    </span>
                                @endif
                                <p class="help-block">file description should be as short as possible.</p>
                            </div>
                            <div class="form-group">
                                <label for="tagName">Tag Name</label>
                                <select class="form-control{{ $errors->has('tagName') ? ' is-invalid' : '' }}" name="tagName" value="{{ old('tagName') }}" required>                            
                                    <option value="Document">Document</option>
                                    <!-- <option value="Image">Image</option> -->
                                </select>
                                @if($errors->has('tagName'))
                                    <span class="invalid-feedback" role="alert" style="color: #ff0000">
                                        <strong>{{ $errors->first('tagName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                              <label for="sendTo">Send To</label>
                              <select class="form-control{{ $errors->has('sendTo') ? ' is-invalid' : '' }}" name="sendTo" value="{{ old('sendTo') }}" required>
                                  <option value=""></option>
                                  <option value="Staff">Staff</option>
                                  <option value="HR">HR</option>
                                  <option value="MD">MD</option>
                              </select>
                              @if($errors->has('sendTo'))
                                  <span class="invalid-feedback" role="alert" style="color: #ff0000">
                                      <strong>{{ $errors->first('sendTo') }}</strong>
                                  </span>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="file">Choose File</label>
                                <input type="file" name="file" value="{{ old('sendTo') }}" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" required>
                                @if($errors->has('file'))
                                    <span class="invalid-feedback" role="alert" style="color: #ff0000">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- <div class="col-lg-6">
                    </div> -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
