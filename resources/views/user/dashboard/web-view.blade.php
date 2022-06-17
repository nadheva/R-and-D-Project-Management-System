<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Web View</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('theme/assets/images/icon.png')}}" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{asset('theme/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{asset('theme/assets/css/connect.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/assets/css/dark_theme.css')}}" rel="stylesheet">
    <link href="{{asset('theme/assets/css/custom.css')}}" rel="stylesheet">
</head>
<body>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="page-container">
            <div class="page-content">
                <div class="main-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                       <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Task Activity</h5>
                                                    <table class="table table-responsive" id="zero-conf100" style="width: 85%;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No.</th>
                                                                <th scope="col">Time</th>
                                                                <th scope="col">Task</th>
                                                                <th scope="col">Project</th>
                                                                <th scope="col">Assigned Person</th>
                                                                <th scope="col">Due Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                         @foreach ($task as $t)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$t->start_time."-".$t->end_time}}</td>
                                                                <td>{{$t->task}}</td>
                                                                <td>{{$t->project}}</td>
                                                                <td>{{$t->user->name}}</td>
                                                                <td>{{$t->start_date}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                             <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Project Status</h5>
                                            <table class="table2" id="zero-conf101" style="width: 85%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Model</th>
                                                        <th scope="col">Item</th>
                                                        <th scope="col">Sub Item</th>
                                                        <th scope="col">PIC</th>
                                                        <th scope="col">Remark </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 @foreach ($project as $p)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$p->model->name}}</td>
                                                        <td>{{$p->item->name}}</td>
                                                        <td>{{$p->sub_item->name}}</td>
                                                        <td>{{$p->user->name}}</td>
                                                        <td>{{$p->remark}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="carousel-item">
                  <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Project RIO</h5>
                                <table class="table2" id="zero-conf102" style="width: 85%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">Issue/Risk/Opportunity</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">PIC</th>
                                            <th scope="col">Due Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach ($rio as $r)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            @if($r->exsist == '0')
                                            <td>{{$r->model->name}}</td>
                                            <td>{{$r->issue}}</td>
                                            <td>{{$r->detail}}</td>
                                            @elseif($r->exsist == '1')
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            @endif
                                            <td>{{$r->action}}</td>
                                            <td>{{$r->user->name}}</td>
                                            <td>{{$r->due_date}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
</div>
</div>
</div>

</div>
</div>
<div class="page-footer">
    <div class="row">
        <div class="col-md-12">
            <span class="footer-text"><?= date('Y') ?> © Astra Visteon Indonesia</span>
        </div>
    </div>
</div>
</div>
</div>

<!-- Javascripts -->
<script src="{{asset('theme/assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/blockui/jquery.blockUI.js')}}"></script>
<script src="{{asset('theme/assets/plugins/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('theme/assets/js/connect.min.js')}}"></script>
<script src="{{asset('theme/assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('theme/assets/plugins/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('theme/assets/js/pages/datatables.js')}}"></script>
</body>
</html>

<script type="text/javascript">
 $(document).ready(function() {
    table = $('#zero-conf100').DataTable({
       "searching": false,
       "bPaginate": false,
       "bLengthChange": false,
       "bFilter": true,
       "bInfo": false,
       "bAutoWidth": false ,
       "order": [[ 3, "desc" ]]
   });
});
$(document).ready(function() {
    table1 = $('#zero-conf101').DataTable({
       "searching": false,
       "bPaginate": false,
       "bLengthChange": false,
       "bFilter": true,
       "bInfo": false,
       "bAutoWidth": false ,
       "order": [[ 3, "desc" ]]
   });
});
$(document).ready(function() {
    table2 = $('#zero-conf102').DataTable({
       "searching": false,
       "bPaginate": false,
       "bLengthChange": false,
       "bFilter": true,
       "bInfo": false,
       "bAutoWidth": false ,
       "order": [[ 3, "desc" ]]
   });
});
 setTimeout(function() {
     location.reload();
 }, 30000);


</script>
