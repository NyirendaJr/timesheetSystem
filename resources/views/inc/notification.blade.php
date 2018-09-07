<div class="row">
 @if(Auth::user()->role == "Staff")
    <!-- download document button for Normal stuff -->
   <div class="col-lg-3 col-md-6">
       <div class="panel panel-default">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-xs-3">
                       <i class="fa  fa-clock-o fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge"><h3>26</h3></div>
                       <div>Remaining Time</div>
                   </div>
               </div>
           </div>
           <div class="panel-footer">
             <a href="/document" class="btn btn-success" type="button" name="button">
               Download Document&nbsp
               <i class="fa fa-download"></i>
             </a>
             <div class="clearfix"></div>
           </div>
       </div>
   </div>

   <!-- Upload document for Normal Staff -->
   <div class="col-lg-3 col-md-6">
       <div class="panel panel-default">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-xs-3">
                       <i class="fa fa-file fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge"><h3>12:34:00</h3></div>
                       <div>Time</div>
                   </div>
               </div>
           </div>
           <div class="panel-footer">
             <a href="{{ URL::to('/document/create') }}"class="btn btn-primary" type="button" name="button">
               Upload Document&nbsp
               <i class="fa  fa-cloud-upload "></i>
             </a>
             <div class="clearfix"></div>
           </div>
       </div>
   </div>

   <!-- Assessment Results -->
   <div class="col-lg-3 col-md-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa  fa-bell fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge"><span class="badge">26</span></div>
                      <div>Assessment Results</div>
                  </div>
              </div>
          </div>
          <a href="#">
              <div class="panel-footer">
                  <span class="pull-left" style="font-size: 14px;">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
 @endif


 <!-- upload document for MD and HR-->
 @if(Auth::user()->role == "Manager" or Auth::user()->role == "HR")
   <div class="col-lg-3 col-md-6">
       <div class="panel panel-default">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-xs-3">
                       <i class="fa fa-file fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">

                   </div>
               </div>
           </div>
           <div class="panel-footer">
             <button class="btn btn-primary" type="button" name="button">
               Upload Document&nbsp
               <i class="fa  fa-cloud-upload "></i>
             </button>
             <div class="clearfix"></div>
           </div>
       </div>
   </div>
  </div>
 @endif
 @yield('content')
