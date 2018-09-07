<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Timesheet - Home</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <style media="screen">
    #brand{
      color: #005581;
      /* font-size: 25px; */
      font-weight: bolder;
      font-family: arial, sans-serif;
      font-weight: bold;
      /* text-shadow: 1px 1px 2px rgba(150, 150,150, 0.75); */
    }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" id="brand">
                  TIMESHEET MANAGEMENT SYSTEM
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="badge">0</span>
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                  @if(Auth::user()->role == "Manager")
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @if($mdnots->count() > 0)
                          <span class="badge">{{ $mdnots->count() }}</span>
                        @else
                          <span class="badge">0</span>
                        @endif
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        @forelse($mdnots as $key => $value)
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-file fa-fw"></i>{{ $value->filedesc }}&nbsp
                                    <span class="pull-right text-muted small">by {{ $value->user_id }}
                                    <span class="label label-primary">{{ $value->created_at }}</span></span>
                                </div>
                            </a>
                        </li>

                        @empty
                        <li class="text-center">
                           You haven't any notification
                        </li>
                        <li class="divider"></li>
                        @endforelse
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All document</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                    @elseif(Auth::user()->role == "HR")
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                          @if($hrnots->count() > 0)
                            <span class="badge">{{ $hrnots->count() }}</span>
                          @else
                            <span class="badge">0</span>
                          @endif
                          <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-alerts">
                          @forelse($hrnots as $key => $value)
                          <li>
                              <a href="#">
                                  <div>
                                      <i class="fa fa-file fa-fw"></i>{{ $value->filedesc }}&nbsp
                                      <span class="pull-right text-muted small">by {{ $value->user_id }}
                                      <span class="label label-primary">{{ $value->created_at }}</span></span>
                                  </div>
                              </a>
                          </li>
                          <li class="divider"></li>
                          @empty
                          <li>
                             You haven't any notification
                          </li>
                          @endforelse
                          <li>
                              <a class="text-center" href="#">
                                  <strong>See All Alerts</strong>
                                  <i class="fa fa-angle-right"></i>
                              </a>
                          </li>
                      </ul>
                  @elseif(Auth::user()->role == "Staff")
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @if($stnots->count() > 0)
                          <span class="badge">{{ $stnots->count() }}</span>
                        @else
                          <span class="badge">0</span>
                        @endif
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        @forelse($stnots as $key => $value)
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-file fa-fw"></i>{{ $value->filedesc }}&nbsp
                                    <span class="label label-primary">{{ $value->created_at }}</span></span>
                                </div>
                            </a>
                        </li>

                        @empty
                        <li class="text-center">
                           You haven't any notification
                        </li>
                        <li class="divider"></li>
                        @endforelse
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All document</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                  @endif
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                  <a id="navbarDropdown" class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-user fa-fw"></i>
                     {{ Auth::user()->lastname }}  ({{ Auth::user()->role }})<span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <i class="fa fa-sign-out fa-fw"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                  </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                          <img src="{{ asset('images/logo.png') }}" height="100" width="220" class="mekonsultlogo" alt="HLB Mekonsult Logo">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li><a href="{{ URL::to('/home') }}"><i class="fa fa-home fa-fw"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Write Message</a></li>
                        <li>
                        <li>
                           <a href="{{ URL::to('/sent') }}"><i class="fa fa-file fa-fw"></i> Sent Document</a>
                        </li>
                        <li>
                           <a href="{{ URL::to('/received') }}"><i class="fa fa-file fa-fw"></i> Received Document</a>
                        </li>

                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       @yield('content')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#wrapper -->

    <!-- modals -->
    <div id="deleteDocument" class="modal fade">
      <form id="docFormUrl" action="sentdocs/" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirm delete</h4>
                </div>
                <div class="modal-body">
                    <p>are you sure?</p>
                    <input type="hidden" id="documentId">
                </div>
                <div class="modal-footer" style="margin-top: 0">
                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
      </form>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <!-- DataTables JavaScript -->
   <script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
   <script src="{{ asset('assets/datatables-responsive/dataTables.responsive.js') }}"></script>
   <script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>
   <script src="{{ asset('assets/js/custome.js') }}"></script>
   <script>
       $(document).ready(function() {
           $('#dataTables-example').DataTable({
               responsive: true
           });
       });
   </script>
</body>
</html>
