<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="_token" content="{{ csrf_token() }}">
  <title>{{ $setting_title->dashboard_name ?? 'COBA' }} | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Version 5 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-5-free/css/all.min.css') }}">
  <!-- Font Awesome Version 6 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-6-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <!-- Leaflet -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/leaflet/leaflet.css') }}">
  <!-- Dropzone -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/dropzone/dropzone.min.css') }}">
  <!-- EL-Smart Theme-->
  <link rel="stylesheet" href="{{ asset('assets/css/el-smart-dashboard.css') }}">
  <!-- ijaboCropTool -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/ijabo-crop-tool/ijaboCropTool.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('/assets/images/EL-SmartLogo_Black.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.navbar')

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')

  <!-- Footer -->
  @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>--}}
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
  // Inisialisasi DataTable
  $(document).ready(function() {
    // Asset List
    $("#assetTable").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": [
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel mr-2"></i> Export to Excel',
                className: 'btn btn-secondary',
                exportOptions: {
                    columns: ':not(.no-export)'
                },
                title: 'ASSET MANAGEMENT REPORT'
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf mr-2"></i> Export to PDF',
                className: 'btn btn-secondary',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':not(.no-export)'
                },
                title: 'ASSET MANAGEMENT REPORT'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print mr-2"></i> Print',
                className: 'btn btn-secondary',
                exportOptions: {
                    columns: ':not(.no-export)'
                },
                title: 'ASSET MANAGEMENT REPORT'
            }
        ]
    }).buttons().container().appendTo('#assetTable_wrapper .col-md-6:eq(0)');
    
    // Simpan dan Pulihkan Status Pagination untuk Asset List
    setupPaginationPersistence('#assetTable');

    // Deleted Asset List
    $("#recycleBinTable").dataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false
    });

    // Simpan dan Pulihkan Status Pagination untuk Deleted Asset List
    setupPaginationPersistence('#recycleBinTable');

    // Option List
    // Item Tab
    $("#itemTable").dataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false
    });

    // Simpan dan Pulihkan Status Pagination untuk Item Tab pada Option List
    setupPaginationPersistence('#itemTable');

    // Other Tabs
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        var targetTabId = $(e.target).attr("href");
        var targetTableId = targetTabId + " .responsive-table";

        if (!$(targetTableId).hasClass("dataTable")) {
            $(targetTableId).DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false
            });

            // Simpan dan Pulihkan Status Pagination untuk Other Tabs pada Option List
            setupPaginationPersistence(targetTableId);
        }
    });
  });

  // Filter Results List
  $("#filteredAssetTable").DataTable({
          "responsive": true,
          "lengthChange": true,
          "autoWidth": false,
          "buttons": [
              {
                  extend: 'excel',
                  text: '<i class="fa fa-file-excel mr-2"></i> Export to Excel',
                  className: 'btn btn-secondary',
                  exportOptions: {
                      columns: ':not(.no-export)'
                  },
                  title: 'ASSET MANAGEMENT REPORT'
              },
              {
                  extend: 'pdf',
                  text: '<i class="fa fa-file-pdf mr-2"></i> Export to PDF',
                  className: 'btn btn-secondary',
                  exportOptions: {
                      columns: ':not(.no-export)'
                  },
                  title: 'ASSET MANAGEMENT REPORT'
              },
              {
                  extend: 'print',
                  text: '<i class="fa fa-print mr-2"></i> Print',
                  className: 'btn btn-secondary',
                  exportOptions: {
                      columns: ':not(.no-export)'
                  },
                  title: 'ASSET MANAGEMENT REPORT'
              }
          ]
      }).buttons().container().appendTo('#filteredAssetTable_wrapper .col-md-6:eq(0)');

      // Simpan dan Pulihkan Status Pagination untuk Filter Results List
      setupPaginationPersistence('#filteredAssetTable');

  // User List
  $("#userTable").dataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
  });

  // Simpan dan Pulihkan Status Pagination untuk User List
  setupPaginationPersistence('#userTable');

  $("#activityLogTable").DataTable({
          "responsive": true,
          "lengthChange": true,
          "autoWidth": false,
          "buttons": [
              {
                  extend: 'excel',
                  text: '<i class="fa fa-file-excel mr-2"></i> Export to Excel',
                  className: 'btn btn-secondary',
                  exportOptions: {
                      columns: ':not(.no-export)'
                  },
                  title: 'ASSET MANAGEMENT REPORT'
              },
              {
                  extend: 'pdf',
                  text: '<i class="fa fa-file-pdf mr-2"></i> Export to PDF',
                  className: 'btn btn-secondary',
                  exportOptions: {
                      columns: ':not(.no-export)'
                  },
                  title: 'ASSET MANAGEMENT REPORT'
              },
              {
                  extend: 'print',
                  text: '<i class="fa fa-print mr-2"></i> Print',
                  className: 'btn btn-secondary',
                  exportOptions: {
                      columns: ':not(.no-export)'
                  },
                  title: 'ASSET MANAGEMENT REPORT'
              }
          ]
      }).buttons().container().appendTo('#activityLogTable_wrapper .col-md-6:eq(0)');

      // Simpan dan Pulihkan Status Pagination untuk Filter Results List
      setupPaginationPersistence('#activityLogTable');

  // Setup Pagination
  function setupPaginationPersistence(tableId) {
    // Simpan Status Pagination saat Ini
    $(tableId).on('page.dt', function () {
        var pageInfo = $(tableId).DataTable().page.info();
        localStorage.setItem(tableId + '_lastAccessedPage', pageInfo.page);
    });

    // Pulihkan Status Pagination saat Refresh
    var lastAccessedPage = localStorage.getItem(tableId + '_lastAccessedPage');
    if (lastAccessedPage !== null) {
        // Jika halaman terakhir yang diakses tersedia, atur halaman tabel ke halaman tersebut
        $(tableId).DataTable().page(parseInt(lastAccessedPage)).draw('page');
    }
  }
</script>

<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
      $('.select2').select2()
    });
</script>
<!-- Leaflet -->
<script src="{{ asset('adminlte/plugins/leaflet/leaflet.js') }}"></script>
<!-- Dropzone -->
<script src="{{ asset('adminlte/plugins/dropzone/dropzone.min.js') }}"></script>
<!-- EL-Smart Theme -->
<script src="{{ asset('assets/js/el-smart-dashboard.js') }}"></script>
<!-- ijaboCropTool -->
<script src="{{ asset('adminlte/plugins/ijabo-crop-tool/ijaboCropTool.min.js') }}"></script>
</body>
</html>