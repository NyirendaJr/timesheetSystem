@extends('layouts.master')
@section('content')
<div class="row">
     <div class="col-lg-12">
         <h4 class="page-header">Received Documents</h4>
     </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Document Title</th>
                            <th>File</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        @if(Auth::user()->role == "HR")
                          @forelse($receivedHr as $key => $value)
                          <tr class="gradeC">
                              <td>{{ $counter++ }}</td>
                              <td>{{ $value->filedesc }}</td>
                              <td>{{ $value->file }}</td>
                              <td class="center">{{ $value->created_at }}</td>
                              <td class="center">{{ $value->lastname }} ({{ $value->role }})</td>
                              <td class="center">
                                <a href="/download/{{ $value->doc_id }}" class="btn btn-info btn-sm">view</a>
                              </td>
                          </tr>
                          @empty
                          @endforelse
                        @elseif(Auth::user()->role == "Manager")
                          @forelse($receivedMd as $key => $value)
                          <tr class="gradeC">
                              <td>{{ $counter++ }}</td>
                              <td>{{ $value->filedesc }}</td>
                              <td>{{ $value->file }}</td>
                              <td class="center">{{ $value->created_at }}</td>
                              <td class="center">{{ $value->lastname }} ({{ $value->role }})</td>
                              <td class="center">
                                <a href="/download/{{ $value->doc_id }}" class="btn btn-info btn-sm">view</a>
                              </td>
                          </tr>
                          @empty
                          @endforelse
                        @elseif(Auth::user()->role == "Staff")
                          @forelse($receivedSt as $key => $value)
                          <tr class="gradeC">
                              <td>{{ $counter++ }}</td>
                              <td>{{ $value->filedesc }}</td>
                              <td>{{ $value->file }}</td>
                              <td class="center">{{ $value->created_at }}</td>
                              <td class="center">{{ $value->lastname }} ({{ $value->role }})</td>
                              <td class="center">
                                <a href="/download/{{ $value->doc_id }}" class="btn btn-info btn-sm">view</a>
                              </td>
                          </tr>
                          @empty
                          @endforelse
                        @endif
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
