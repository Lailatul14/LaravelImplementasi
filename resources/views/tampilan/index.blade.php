<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="gentelella-master/production/images/favicon.ico" type="image/ico" />

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="gentelella-master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="gentelella-master/build/css/custom.min.css" rel="stylesheet">

    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!-- Datatables -->
    
    <link href="gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="gentelella-master/production/images/yejin2.jpg" alt="..." class="img-circle profile_img">
                
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Lailatul R</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              @include('tampilan/sidebar')
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              @include('tampilan/header')
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- Modal awal konten -->
          <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
            <div role="document" class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 id="exampleModalLabel" class="modal-title">Getaway Timeout</h4>
                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                  <p>Sesi akan berakhir, apakah anda ingin memperpanjang sesi?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" data-dismiss="modal" onclick="timerIncrement()" class="btn btn-primary">Ok</button>
                  <button type="button" data-dismiss="modal"  onclick="stop()" class="btn btn-secondary">Tidak</button>
                </div>
              </div>
            </div>
          </div>

            <!-- Modal akhir konten -->
          <!-- top tiles -->
         @yield('konten')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('tampilan/footer')
        <!-- /footer content -->
      </div>
    </div>

<!-- JavaScript files-->
    <!-- Session Scripts -->
    <!-- Scripts -->
   <script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function () {
            //Increment the idle time counter every second.
            var idleInterval = setInterval(timerIncrement, 30000); // 1 second

            //Zero the idle timer on mouse movement.
            $(this).mousemove(function (e) {
                idleTime = 0;
            });
            $(this).keypress(function (e) {
                idleTime = 0;
            });
        });

        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime > 59) { // 30 minutes
                $('#myModal').modal('show');
                if (idleTime > 60){
                    $('#myModal').modal('hide');
                    window.alert("Waktu sesi anda telah habis");
                }
            }
        }

        function reload(){
            window.location.reload();
        }

        function stop(){
            $('#myModal').modal('hide');
            window.alert("Waktu sesi anda telah habis");
        }

    </script>
    <!-- jQuery -->
    <script src="gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="gentelella-master/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="gentelella-master/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="gentelella-master/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="gentelella-master/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="gentelella-master/vendors/Flot/jquery.flot.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="gentelella-master/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="gentelella-master/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="gentelella-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="gentelella-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="gentelella-master/vendors/moment/min/moment.min.js"></script>
    <script src="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

     <!-- Datatables -->
    <script src="gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
    <script src="gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="gentelella-master/build/js/custom.min.js"></script>
  
  </body>
</html>
