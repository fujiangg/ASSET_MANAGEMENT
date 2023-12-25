@extends('layouts.app')

@section('title', 'ASSET MANAGEMENT')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Asset Management</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header d-flex align-items-center bg-secondary">
                        <a href="{{ route('dynamic-table.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                        {{-- <a href="#" onclick="history.back();" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a> --}}
                        <h4 class="m-0">Option List</h4>
                    </div>
                    <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="tab" role="tablist">
                        @foreach ($item_column as $column)
                            <li class="nav-item">
                                <a class="nav-link active" id="item-tab" data-toggle="pill" href="#item" role="tab" aria-controls="item" aria-selected="true"><b>{{ $column }}</b></a>
                            </li>
                        @endforeach
                        @foreach ($manufacturer_column as $column)
                            <li class="nav-item">
                                <a class="nav-link" id="manufacturer-tab" data-toggle="pill" href="#manufacturer" role="tab" aria-controls="manufacturer" aria-selected="false"><b>{{ $column }}</b></a>
                            </li>                           
                        @endforeach
                        @foreach ($configuration_status_column as $column)
                            <li class="nav-item">
                                <a class="nav-link" id="configuration-status-tab" data-toggle="pill" href="#configuration-status" role="tab" aria-controls="configuration-status" aria-selected="false"><b>{{ $column }}</b></a>
                            </li>                           
                        @endforeach
                        @foreach ($location_column as $column)
                            <li class="nav-item">
                                <a class="nav-link" id="location-tab" data-toggle="pill" href="#location" role="tab" aria-controls="location" aria-selected="false"><b>{{ $column }}</b></a>
                            </li>                           
                        @endforeach
                        @foreach ($position_status_column as $column)
                            <li class="nav-item">
                                <a class="nav-link" id="position-status-tab" data-toggle="pill" href="#position-status" role="tab" aria-controls="position-status" aria-selected="false"><b>{{ $column }}</b></a>
                            </li>                           
                        @endforeach
                    </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade show active" id="item" role="tabpanel" aria-labelledby="item-tab">
                            <div>
                                @if(Session::has('success-item'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success! </strong>{{ Session::get('success-item') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if(Session::has('error-item'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Failed! </strong>{{ Session::get('error-item') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="row mb-4">
                                    @foreach ($item_column as $column)
                                        <div class="col-sm-12">
                                            <a href="{{ route('pages.management.items.create') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New {{ $column }}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <table id="itemTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('pages.management.items.edit', $item->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                                <form method="post" action="{{ route('pages.management.items.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white mb-2 mr-1" onclick="return confirm('Are you sure you want to delete this data?')">
                                                        <i class="fa-solid fa-trash mr-2"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="manufacturer" role="tabpanel" aria-labelledby="manufacturer-tab">
                            <div>
                                @if(Session::has('success-manufacturer'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success! </strong>{{ Session::get('success-manufacturer') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if(Session::has('error-manufacturer'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Failed! </strong>{{ Session::get('error-manufacturer') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="row mb-4">
                                    @foreach ($manufacturer_column as $column)
                                        <div class="col-sm-12">
                                            <a href="{{ route('pages.management.manufacturers.create') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New {{ $column }}</a>
                                        </div>                                        
                                    @endforeach
                                </div>
                                <table id="manufacturerTable" class="table table-bordered table-hover responsive-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($manufacturers as $manufacturer)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $manufacturer->name }}</td>
                                            <td>{{ $manufacturer->created_at }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('pages.management.manufacturers.edit', $manufacturer->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                                <form method="post" action="{{ route('pages.management.manufacturers.destroy', $manufacturer->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white mb-2 mr-1" onclick="return confirm('Are you sure you want to delete this data?')">
                                                        <i class="fa-solid fa-trash mr-2"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="configuration-status" role="tabpanel" aria-labelledby="configuration-status-tab">
                            <div>
                                @if(Session::has('success-configuration-status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success! </strong>{{ Session::get('success-configuration-status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if(Session::has('error-configuration-status'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Failed! </strong>{{ Session::get('error-configuration-status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="row mb-4">
                                    @foreach ($configuration_status_column as $column)
                                        <div class="col-sm-12">
                                            <a href="{{ route('pages.management.configuration-statuses.create') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New {{ $column }}</a>
                                        </div>                                      
                                    @endforeach
                                </div>
                                <table id="configurationStatusTable" class="table table-bordered table-hover responsive-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($configuration_statuses as $configuration_status)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $configuration_status->name }}</td>
                                            <td>{{ $configuration_status->created_at }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('pages.management.configuration-statuses.edit', $configuration_status->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                                <form method="post" action="{{ route('pages.management.configuration-statuses.destroy', $configuration_status->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white mb-2 mr-1" onclick="return confirm('Are you sure you want to delete this data?')">
                                                        <i class="fa-solid fa-trash mr-2"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                            <div>
                                    @if(Session::has('success-location'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success! </strong>{{ Session::get('success-location') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    @if(Session::has('error-location'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Failed! </strong>{{ Session::get('error-location') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="row mb-4">
                                        @foreach ($location_column as $column)
                                            <div class="col-sm-12">
                                                <a href="{{ route('pages.management.locations.create') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New {{ $column }}</a>
                                            </div>                                           
                                        @endforeach
                                    </div>
                                    <table id="locationTable" class="table table-bordered table-hover responsive-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach($locations as $location)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $location->name }}</td>
                                                <td>{{ $location->address }}</td>
                                                <td>{{ $location->latitude }}</td>
                                                <td>{{ $location->longitude }}</td>
                                                <td>{{ $location->created_at }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('pages.management.locations.edit', $location->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                                    <form method="post" action="{{ route('pages.management.locations.destroy', $location->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm text-white mb-2 mr-1" onclick="return confirm('Are you sure you want to delete this data?')">
                                                            <i class="fa-solid fa-trash mr-2"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div id="locationPopup">
                                        <div id="map" style="height: 50vh; width: 50vh;"></div>
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane fade" id="position-status" role="tabpanel" aria-labelledby="position-status-tab">
                            <div>
                                @if(Session::has('success-position-status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success! </strong>{{ Session::get('success-position-status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if(Session::has('error-position-status'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Failed! </strong>{{ Session::get('error-position-status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div id="successAlert"></div>
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        @foreach ($position_status_column as $column)
                                            <a href="{{ route('pages.management.position-statuses.create') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New {{ $column }}</a>                                           
                                        @endforeach
                                    </div>
                                </div>
                                <table id="positionStatusTable" class="table table-bordered table-hover responsive-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($position_statuses as $position_status)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $position_status->name }}</td>
                                            <td>{{ $position_status->created_at }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('pages.management.position-statuses.edit', $position_status->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                                <form method="post" action="{{ route('pages.management.position-statuses.destroy', $position_status->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white mb-2 mr-1" onclick="return confirm('Are you sure you want to delete this data?')">
                                                        <i class="fa-solid fa-trash mr-2"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Leaflet -->
        {{-- <script src="{{ asset('adminlte/plugins/leaflet/leaflet.js') }}"></script> --}}

        <script>
            var map;
            var marker;

            function showLocationPopup(latitude, longitude, name, address) {
                document.getElementById('locationPopup').style.display = 'block';
                if (!map) {
                    map = L.map('map').setView([latitude, longitude], 18);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                        maxZoom: 18,
                    }).addTo(map);
                    marker = L.marker([latitude, longitude]).addTo(map).bindPopup(`<b>${name}</b><br>${address}`, {
                        closeButton: false
                    }).openPopup();
                } else {
                    map.setView([latitude, longitude], 18);
                    marker.setLatLng([latitude, longitude]);
                    marker.getPopup().setContent(`<b>${name}</b><br>${address}`).openPopup();
                }
            }

            function hideLocationPopup() {
                document.getElementById('locationPopup').style.display = 'none';
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const lastOpenedTab = localStorage.getItem('lastOpenedTab');

                if (lastOpenedTab) {
                    $('.nav-tabs a[href="#' + lastOpenedTab + '"]').tab('show');
                }

                $('.nav-tabs a').on('shown.bs.tab', function (event) {
                    const activeTab = event.target.getAttribute('href').substring(1);
                    localStorage.setItem('lastOpenedTab', activeTab);
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const lastOpenedTab = localStorage.getItem('lastOpenedTab');

                if (lastOpenedTab) {
                    $('.nav-tabs a[href="#' + lastOpenedTab + '"]').tab('show');
                }

                $('.nav-tabs a').on('shown.bs.tab', function (event) {
                    const activeTab = event.target.getAttribute('href').substring(1);
                    localStorage.setItem('lastOpenedTab', activeTab);
                });
            });
        </script>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection