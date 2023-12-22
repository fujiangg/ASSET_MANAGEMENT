<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/images/Dashboard_Logo/Dashboard_Logo_Dark.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!-- Right navbar links -->
     <a class="nav-link logout-button" href="http://127.0.0.1:8000/">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>


      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ \URL::to('/')}}" class="brand-link">
      <img src="{{ asset('assets/images/Dashboard_Logo/Dashboard_Logo_Light.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EL SMART</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2 admin_picture" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.profile')}}" class="d-block admin_name">{{ Auth::user()->name }}</a>
        </div>
      </div>

 <!-- SidebarSearch Form -->
 <div class="form-inline">
  <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
      </button>
    </div>
  </div>
</div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('admin.dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th-large"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
               <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-magic"></i>
                  <p>
                    Edit Page
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('datanavbar')}}" class="nav-link {{ (request()->is('datanavbar*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Navigation Bar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('datahome')}}" class="nav-link {{ (request()->is('datahome*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Home page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('dataaboutus')}}" class="nav-link {{ (request()->is('dataaboutus*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>About Us Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('dataourproject')}}" class="nav-link {{ (request()->is('dataourproject*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Our Projects Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('datacontactus')}}" class="nav-link {{ (request()->is('datacontactus*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Contact Us Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('datafooter')}}" class="nav-link {{ (request()->is('datafooter*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Footer</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-project-diagram"></i>
                  <p>
                    Project Management
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('dataprojectmanagement')}}" class="nav-link {{ (request()->is('dataprojectmanagement*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create New Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('dataportallogin')}}" class="nav-link {{ (request()->is('dataportallogin*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Portal Login</p>
                    </a>
                  </li>
                </ul>
              </li>
          {{-- <li class="nav-item">
            <a href="{{ route('datausermanagement')}}" class="nav-link {{ (request()->is('datausermanagement*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i> 
              <p>User Management</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('datamessage')}}" class="nav-link {{ (request()->is('datamessage*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-comments"></i>
              <p>Message Management</p>
            </a>
          </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="http://127.0.0.1:8000/landingpage">ProKing Indonesia</a>.</strong> All rights reserved.
  </footer>
</div>
@include('sweetalert::alert')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ ('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

{{-- CUSTOM JS CODES --}}
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(function () {
    $("#myTable1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": [
        {
                extend: 'copy',
                text: '<i class="fa fa-copy mr-2"></i> Copy',
                className: 'btn btn-secondary'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel mr-2"></i> Export to Excel',
                className: 'btn btn-secondary'
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf mr-2"></i> Export to PDF',
                className: 'btn btn-secondary'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print mr-2"></i> Print',
                className: 'btn btn-secondary'
            }
        ]
    }).buttons().container().appendTo('#myTable1_wrapper .col-md-6:eq(0)');
    $("#myTable2").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
    });
    $("#myDataTable1, #myDataTable2, #myDataTable3, #myDataTable4, #myDataTable5").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
    });
  });






  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });



    $(document).on('click','#change_picture_btn', function(){
      $('#admin_image').click();
    });


    $('#admin_image').ijaboCropTool({
          preview : '.admin_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("adminPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });


    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });
    
  });

  // NAVBAR

  $(document).on('click','#change_picture_navbar', function(){
      $('#navbar_image').click();

    });

</script>
</body>
</html>
