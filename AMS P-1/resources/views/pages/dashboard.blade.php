@extends('layouts.app')

@section('title', 'DASHBOARD')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    {{-- <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Assets</span>
                <span class="info-box-number">{{ $all }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-question-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unconfigured</span>
                <span class="info-box-number">{{ $unconfigured }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Preconfigured</span>
                <span class="info-box-number">{{ $preconfigured }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cogs"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Configured</span>
                <span class="info-box-number">{{ $configured }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tested</span>
                <span class="info-box-number">{{ $tested }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1 text-white"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Installed</span>
                <span class="info-box-number">{{ $installed }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Recent</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Manufacturer</th>
                        <th>Serial Number</th>
                        <th>Configuration Status</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Position Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @foreach($data_tables as $data_table)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $data_table->item->name }}</td>
                          <td>{{ $data_table->manufacturer->name }}</td>
                          <td>{{ $data_table->serial_number }}</td>
                          <td>{{ $data_table->configurationStatus->name }}</td>
                          <td>{{ $data_table->location->name }}</td>
                          <td>{{ $data_table->description }}</td>
                          <td>{{ $data_table->positionStatus->name }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
                <!-- /.table-responsive -->

              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section> --}}
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <!-- Dropdown Filter -->
          <div class="col-lg-12 pb-3 d-flex align-items-center justify-content-end">
            <label for="filterCategory" class="font-weight-normal mb-0 mr-2">Filter by:</label>
            <select id="filterCategory" class="col-lg-2 col-4 form-control">
              @foreach ($item_column as $column)
                <option value="items">{{ $column }}</option>
              @endforeach
              @foreach ($manufacturer_column as $column)
                <option value="manufacturers">{{ $column }}</option>                 
              @endforeach
              @foreach ($configuration_status_column as $column)
                <option value="configuration_statuses">{{ $column }}</option>                 
              @endforeach
              @foreach ($location_column as $column)
                <option value="locations">{{ $column }}</option>               
              @endforeach
              @foreach ($position_status_column as $column)
                <option value="position_statuses">{{ $column }}</option>                 
              @endforeach
            </select>
          </div>
          <!-- Filter Result Content -->
          <div class="col-lg-12 p-0 d-flex horizontal-scroll">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <div class="pt-2 pr-2 pl-2">
                            <h3>{{ $all_assets }}</h3>
                            <p>All Asset</p>
                        </div>
                    </div>
                    <a href="{{ route('dynamic-table.index') }}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            @foreach ($items as $item)
              <div class="col-lg-3 col-6 filter-content" data-category="items">
                  <div class="small-box bg-success">
                      <div class="inner">
                          <div class="pt-2 pr-2 pl-2">
                              <h3>{{ $item->dataTables->count() }}</h3>
                              <p>{{ $item->name }}</p>
                          </div>
                      </div>
                      <a href="{{ route('pages.data-tables.filter-results.item', ['item' => $item->id]) }}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            @endforeach
            <!-- ./col -->
            @foreach ($manufacturers as $manufacturer)
              <div class="col-lg-3 col-6 filter-content" data-category="manufacturers">
                  <div class="small-box bg-pink">
                      <div class="inner">
                          <div class="pt-2 pr-2 pl-2">
                              <h3>{{ number_format($manufacturer->dataTables->count(), 0, '.', '.') }}</h3>
                              <p>{{ $manufacturer->name }}</p>
                          </div>
                      </div>
                      <a href="{{ route('pages.data-tables.filter-results.manufacturer', ['manufacturer' => $manufacturer->id]) }}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            @endforeach
            <!-- ./col -->
            @foreach ($configuration_statuses as $configuration_status)
              <div class="col-lg-3 col-6 filter-content" data-category="configuration_statuses">
                  <div class="small-box bg-teal">
                      <div class="inner">
                          <div class="pt-2 pr-2 pl-2">
                              <h3>{{ number_format($configuration_status->dataTables->count(), 0, '.', '.') }}</h3>
                              <p>{{ $configuration_status->name }}</p>
                          </div>
                      </div>
                      <a href="{{ route('pages.data-tables.filter-results.configuration-status', ['configuration_status' => $configuration_status->id]) }}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            @endforeach
            <!-- ./col -->
            @foreach ($locations as $location)
              <div class="col-lg-3 col-6 filter-content" data-category="locations">
                  <div class="small-box bg-indigo">
                      <div class="inner">
                          <div class="pt-2 pr-2 pl-2">
                              <h3>{{ number_format($location->dataTables->count(), 0, '.', '.') }}</h3>
                              <p>{{ $location->name }}</p>
                          </div>
                      </div>
                      <a href="{{ route('pages.data-tables.filter-results.location', ['location' => $location->id]) }}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            @endforeach
            <!-- ./col -->
            @foreach ($position_statuses as $position_status)
              <div class="col-lg-3 col-6 filter-content" data-category="position_statuses">
                  <div class="small-box bg-olive">
                      <div class="inner">
                          <div class="pt-2 pr-2 pl-2">
                              <h3>{{ number_format($position_status->dataTables->count(), 0, '.', '.') }}</h3>
                              <p>{{ $position_status->name }}</p>
                          </div>
                      </div>
                      <a href="{{ route('pages.data-tables.filter-results.position-status', ['position_status' => $position_status->id]) }}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
            @endforeach
            <!-- ./col -->
          </div>
        </div>
        <!-- /.row -->

        <!-- MAPS -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-body">
                <div id="map" style="height: 50vh;"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Leaflet -->
        <script src="{{ asset('adminlte/plugins/leaflet/leaflet.js') }}"></script>

        <script>
            var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                osm = L.tileLayer(osmUrl, { maxZoom: 25, minZoom: 5, attribution: osmAttrib });
            var map = L.map('map').setView([-1.677197492985551, 117.91976992148997], 5).addLayer(osm);
            L.control.scale().addTo(map);

            $(document).ready(function(){
                $.getJSON('/dynamic-table/option-management/locations/marker', function(data){
                    $.each(data, function(index, location){
                        var id = location.id;
                        var name = location.name;
                        var address = location.address;
                        var latitude = location.latitude;
                        var longitude = location.longitude;
                        var totalAssets = location.totalAssets;

                        // Tambahkan marker ke peta
                        var marker = L.marker([parseFloat(latitude), parseFloat(longitude)]);
                        marker.addTo(map);

                        // Atur action untuk klik marker
                        marker.on('click', function () {
                            window.location.href = '/dynamic-table/filter-results/location/'+id;
                        });

                        // Tambahkan teks popup
                        marker.bindPopup("<center><h5><b>"+name+"</b></h5><p>"+address+"</p><h6>Total Assets: "+totalAssets+"</h6></center>", {
                            closeButton: false
                        });

                        // Tampilkan popup saat mouse over marker
                        marker.on('mouseover', function (e) {
                            this.openPopup();
                        });

                        // Tutup popup saat mouse out dari marker
                        marker.on('mouseout', function (e) {
                            this.closePopup();
                        });
                    });
                });
            });
        </script>

        <script>
            // JavaScript to show/hide content based on dropdown selection
            var filterCategory = document.getElementById('filterCategory');
            var filterContents = document.querySelectorAll('.filter-content');

            // Get last selected category from local storage
            var lastSelectedCategory = localStorage.getItem('lastSelectedCategory');
            if (lastSelectedCategory) {
                filterCategory.value = lastSelectedCategory;
            }

            // Show content based on last selected category
            filterContents.forEach(function (content) {
                if (content.getAttribute('data-category') === filterCategory.value) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });

            // Update content and save selected category to local storage on change
            filterCategory.addEventListener('change', function () {
                var selectedCategory = this.value;

                filterContents.forEach(function (content) {
                    if (content.getAttribute('data-category') === selectedCategory) {
                        content.style.display = 'block';
                    } else {
                        content.style.display = 'none';
                    }
                });

                // Save selected category to local storage
                localStorage.setItem('lastSelectedCategory', selectedCategory);
            });
        </script>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection