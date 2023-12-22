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
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center bg-secondary">
                        {{-- <a href="{{ route('dynamic-table.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a> --}}
                        <a href="#" onclick="history.back();" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                        <h4 class="m-0">Deleted Asset List</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success! </strong>{{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Failed! </strong>{{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div id="successAlert"></div>
                            <table id="recycleBinTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        @foreach ($item_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($manufacturer_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($serial_number_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($configuration_status_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($location_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($description_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($position_status_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        @foreach ($created_date_column as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                        {{-- @foreach ($visible_new_columns as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach --}}
                                        <th>Action</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($dynamic_data_table as $row)
                                    <tr>
                                        {{-- <td>{{ $no++ }}</td>
                                        <td>{{ $data_table->item->name }}</td>
                                        <td>{{ $data_table->manufacturer->name }}</td>
                                        <td>{{ $data_table->serial_number }}</td>
                                        <td>{{ $data_table->configurationStatus->name }}</td>
                                        <td onmouseover="showLocationPopup('{{ $data_table->location->latitude }}', '{{ $data_table->location->longitude }}', '{{ $data_table->location->name }}', '{{ $data_table->location->address }}')" onmouseout="hideLocationPopup()">{{ $data_table->location->name }}</td>
                                        <td>{{ $data_table->description }}</td>
                                        <td>{{ $data_table->positionStatus->name }}</td>
                                        <td>{{ $data_table->deleted_at }}</td>
                                        <td>
                                            <a href="{{ route('pages.data-tables.restore', $data_table->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-recycle mr-2"></i>Restore</a>
                                            <a href="{{ route('pages.data-tables.force-delete', $data_table->id) }}" class="btn btn-danger btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-trash mr-2"></i>Delete Forever</a>
                                        </td> --}}
                                        <td>{{ $no++ }}</td>
                                        @foreach ($item_column as $columns)
                                            <td>
                                                @php
                                                    $item = \App\Models\Item::find($row[$columns]);
                                                @endphp
                                                {{ $item ? $item->name : '-' }}
                                            </td>
                                        @endforeach

                                        @foreach ($manufacturer_column as $columns)
                                            <td>
                                                @php
                                                    $item = \App\Models\Manufacturer::find($row[$columns]);
                                                @endphp
                                                {{ $item ? $item->name : '-' }}
                                            </td>
                                        @endforeach

                                            <td>{{ $row[reset($serial_number_column)] }}</td>

                                        @foreach ($configuration_status_column as $columns)
                                            <td>
                                                @php
                                                    $item = \App\Models\ConfigurationStatus::find($row[$columns]);
                                                @endphp
                                                {{ $item ? $item->name : '-' }}
                                            </td>
                                        @endforeach
                                        @foreach ($location_column as $columns)
                                            <td>
                                            {{-- <td onmouseover="showLocationPopup('{{ $data_table->location->latitude }}', '{{ $data_table->location->longitude }}', '{{ $data_table->location->name }}', '{{ $data_table->location->address }}')" onmouseout="hideLocationPopup()"> --}}
                                                @php
                                                    $item = \App\Models\Location::find($row[$columns]);
                                                @endphp
                                                {{ $item ? $item->name : '-' }}
                                            </td>
                                        @endforeach

                                            <td>{{ $row[reset($description_column)] }}</td>

                                        @foreach ($position_status_column as $columns)
                                            <td>
                                                @php
                                                    $item = \App\Models\PositionStatus::find($row[$columns]);
                                                @endphp
                                                {{ $item ? $item->name : '-' }}
                                            </td>
                                        @endforeach

                                            <td>{{ $row[reset($created_date_column)] }}</td>

                                        {{-- @foreach ($visible_new_columns as $column)
                                            <td>{{ $row[$column] }}</td>
                                        @endforeach --}}

                                        <td>
                                            <a href="{{ route('dynamic-table.restore', ['id' => $row['id']]) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-recycle mr-2"></i>Restore</a>
                                            <a href="{{ route('dynamic-table.force-delete', ['id' => $row['id']]) }}" class="btn btn-danger btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-trash mr-2"></i>Delete Forever</a>
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
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Leaflet -->
        <script src="{{ asset('adminlte/plugins/leaflet/leaflet.js') }}"></script>

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
            function updateFileName() {
                var fileInput = document.getElementById('customFile');
                var fileName = fileInput.files[0].name;
                var fileLabel = document.getElementById('fileLabel');
                fileLabel.innerHTML = fileName;
            }
        </script>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection