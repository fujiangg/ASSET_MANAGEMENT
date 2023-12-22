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
                    <div class="card-header bg-secondary">
                        <div class="col-sm-13">
                            <div class="float-sm-left">
                                <h4 class="mb-0">Asset List</h4>
                            </div>
                            <div class="float-sm-right">
                                {{-- <form action="{{ route('dynamic-table.columnSync') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-secondary text-white" type="submit"><i class="fa-solid fa-refresh mr-2"></i>Table Sync</button>
                                </form>                         --}}
                        </div>
                    </div>
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
                            @if(Auth::user()->role->id != '3')
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <a href="{{ route('dynamic-table.create') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New Asset</a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#modal">
                                        <i class="fa-solid fa-file-import mr-2"></i>Import New Asset
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title fs-5" id="modalLabel">Import New Asset Data</h1>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('dynamic-table.import-excel') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div>
                                                            <p>Upload an <a href="{{ asset('/assets/files/import_new_data_template.xlsx') }}">Excel</a> file here to import new asset data!</p>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input" id="customFile" required accept=".xls,.xlsx" onchange="updateFileName()">
                                                            <label class="custom-file-label" for="customFile" id="fileLabel">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('dynamic-table.recycle-bin') }}" class="btn btn-primary mr-1"><i class="fa-solid fa-recycle mr-2"></i>Recycle Bin</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-sm-right">
                                        @if(Auth::user()->role->id != '2')
                                            <a href="{{ route('dynamic-table.column-management.index') }}" class="btn btn-warning text-white"><i class="fa-solid fa-list-check mr-2"></i>Column Management</a>
                                        @endif
                                        <a href="{{ route('pages.management.index') }}" class="btn btn-warning text-white"><i class="fa-solid fa-list-check mr-2"></i>Option Management</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <table id="assetTable" class="table table-bordered table-hover">
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
                                        {{-- @foreach ($deleted_at_column as $column)
                                            <td>{{ $column }}</td>
                                        @endforeach --}}
                                        {{-- @foreach ($visible_new_columns as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach --}}
                                        <th class="no-export">Action</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data as $row)
                                        <tr>
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
                                                @php
                                                    $locationId = $row[$columns];
                                                    $location = \App\Models\Location::find($locationId);
                                                @endphp
                                                <td onclick="toggleLocationPopup('{{ $location->latitude }}', '{{ $location->longitude }}', '{{ $location->name }}', '{{ $location->address }}')">
                                                    <div id="locationPopup">
                                                        <div id="map" style="height: 25vh; width: 50vh;"></div>
                                                    </div>        
                                                    @php
                                                        $item = \App\Models\Location::find($row[$columns]);
                                                    @endphp
                                                    {{ $item ? $item->name : '-' }}
                                                </td>
                                            @endforeach

                                                <td>{{ $row[reset($description_column)] }}</td>

                                            {{-- @foreach ($description_column as $columns)
                                                <td>
                                                    {{-- @php
                                                        $item = \App\Models\Item::find($row[$column]);
                                                    @endphp
                                                    {{ $item ? $item->name : '-' }} 
                                                </td>
                                            @endforeach --}}

                                            @foreach ($position_status_column as $columns)
                                                <td>
                                                    @php
                                                        $item = \App\Models\PositionStatus::find($row[$columns]);
                                                    @endphp
                                                    {{ $item ? $item->name : '-' }}
                                                </td>
                                            @endforeach

                                                <td>{{ $row[reset($created_date_column)] }}</td>

                                            {{-- @foreach ($created_date_column as $columns)
                                                <td>
                                                    {{-- @php
                                                        $item = \App\Models\Item::find($row[$column]);
                                                    @endphp
                                                    {{ $item ? $item->name : '-' }} 
                                                </td>
                                            @endforeach --}}

                                            {{-- @foreach ($visible_new_columns as $column)
                                                <td>{{ $row[$column] }}</td>
                                            @endforeach --}}
                                            {{-- <td>{{ $row[reset($visible_new_columns)] }}</td> --}}

                                            <td>
                                                <a href="{{ route('dynamic-table.show', ['id' => $row['id']]) }}" class="btn btn-primary btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-eye mr-2"></i>Show</a>
                                                @if(Auth::user()->role->id != '3')
                                                <a href="{{ route('dynamic-table.edit', ['id' => $row['id']]) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                                <a href="{{ route('dynamic-table.soft-delete', ['id' => $row['id']]) }}" class="btn btn-danger btn-sm text-white mb-2 mr-1" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa-solid fa-trash mr-2"></i>Delete</a>
                                                @endif
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

            // Fungsi toggle untuk menampilkan atau menyembunyikan popup
            function toggleLocationPopup(latitude, longitude, name, address) {
                var locationPopup = document.getElementById('locationPopup');
                if (locationPopup.style.display === 'block') {
                    hideLocationPopup();
                } else {
                    showLocationPopup(latitude, longitude, name, address);
                }
            }

            // Fungsi untuk menampilkan popup
            function showLocationPopup(latitude, longitude, name, address) {
                document.getElementById('locationPopup').style.display = 'block';
                if (!map) {
                    map = L.map('map').setView([latitude, longitude], 18);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                        maxZoom: 18,
                    }).addTo(map);
                    marker = L.marker([latitude, longitude]).addTo(map).bindPopup(`<center><b>${name}</b><br>${address}</center>`, {
                        closeButton: false
                    }).openPopup();
                } else {
                    map.setView([latitude, longitude], 18);
                    marker.setLatLng([latitude, longitude]);
                    marker.getPopup().setContent(`<center><b>${name}</b><br>${address}</center>`).openPopup();
                }

                // Tambahkan event listener untuk menutup popup saat mengklik di luar
                document.addEventListener('mousedown', closePopupOutside);
            }

            // Fungsi untuk menyembunyikan popup
            function hideLocationPopup() {
                document.getElementById('locationPopup').style.display = 'none';

                // Hapus event listener setelah menyembunyikan popup
                document.removeEventListener('mousedown', closePopupOutside);
            }

            // Fungsi untuk menutup popup saat mengklik di luar
            function closePopupOutside(event) {
                var locationPopup = document.getElementById('locationPopup');
                var targetElement = event.target; // Element yang diklik

                // Periksa apakah yang diklik bukan bagian dari locationPopup
                if (!locationPopup.contains(targetElement)) {
                    hideLocationPopup();
                }
            }
        </script>

        <script>
            // Fungsi untuk mengubah nama file pada form input Import New Data sesuai dengan nama file yang diupload
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