@extends('layouts.master')
@section('content')
<!-- /.row -->
<div class="row">
     <div class="col-lg-12">
         <h4 class="page-header">Download Document</h4>
     </div>
</div>
<div class="row">
   <div class="col-lg-12">
      <iframe src="{{ $docs }}" frameborder="0" style="width:100%;height:500px;"></iframe>
   </div>
</div>
@endsection
