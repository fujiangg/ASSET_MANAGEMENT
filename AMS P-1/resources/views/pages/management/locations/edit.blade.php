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
                        {{-- <a href="{{ route('pages.management.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a> --}}
                        <a href="#" onclick="history.back();" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                        <h4 class="m-0">Edit Location Data</h4>
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
                            <div class="form-group">
                                <div class="input-group input-group-md">
                                    <input type="search" class="search-location form-control form-control-md" placeholder="Search Location" oninput="onTyping(this)" />
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-md btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="input-group-append">
                                    <ul id="search-result" class="dropdown-list text-md"></ul>
                                </div>
                            </div>
                            <div id="map" class="rounded shadow-sm mb-3" style="height: 45vh; width: 100%;"></div>
                            <form method="post" name="dataTableForm" id="dataTableForm" action="">
                                @csrf
                                @method('post')
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{$location->name}}"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="address">Address</label>
                                    <textarea type="text" name="address" id="address" placeholder="Address" class="form-control">{{ $location->address }}</textarea>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" placeholder="Latitude" class="form-control" value="{{$location->latitude}}"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="longitude">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" placeholder="Longitude" class="form-control" value="{{$location->longitude}}"></input>
                                    <p></p>
                                </div>
                                <div class="mt-4 float-right">
                                    <a href="{{ route('pages.management.index') }}" class="btn btn-secondary mr-1">Cancel</a>
                                    <input type="submit" value="Save" class="btn btn-primary" />
                                </div>
                            </form>
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
            const initialLatitude = parseFloat(document.getElementById('latitude').value);
            const initialLongitude = parseFloat(document.getElementById('longitude').value);
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            const resultsWrapperHTML = document.getElementById("search-result");
            let marker;

            // Initial Map
            const Map = L.map("map");

            // Initial OSM Tile URL
            const osmTileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            const attrib = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors';
            const osmTile = new L.tileLayer(osmTileUrl, { minZoom: 2, maxZoom: 20, attribution: attrib });

            // Add Layer
            Map.setView(new L.LatLng(initialLatitude, initialLongitude), 18);
            Map.addLayer(osmTile);

            // Add Marker
            marker = L.marker([initialLatitude, initialLongitude]).addTo(Map);

            // Input Value
            function inputValue() {
                const latitude = parseFloat(latitudeInput.value);
                const longitude = parseFloat(longitudeInput.value);

                if (isNaN(latitude) || isNaN(longitude)) {
                    return;
                }

                if (marker) {
                    Map.removeLayer(marker);
                }

                marker = L.marker([latitude, longitude]).addTo(Map);
                Map.setView([latitude, longitude], 18);
            }

            latitudeInput.addEventListener('input', inputValue);
            longitudeInput.addEventListener('input', inputValue);

            // Click Listener
            Map.on("click", function(e){
                const {lat, lng} = e.latlng;

                // Regenerate marker position
                if (marker) {
                    Map.removeLayer(marker);
                }
                marker = L.marker([lat, lng]).addTo(Map);

                // Update latitude and longitude input values
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            })

            // Search Location Handler
            let typingInterval;

            // Typing Handler
            function onTyping(e) {
                clearInterval(typingInterval);
                const {value} = e;

                typingInterval = setInterval(() => {
                    clearInterval(typingInterval);
                    searchLocation(value);
                }, 500);
            }

            // Search Handler
            function searchLocation(keyword) {
                if(keyword) {
                    // Request To Nominatim API
                    fetch(`https://nominatim.openstreetmap.org/search?q=${keyword}&format=json`)
                    .then((response) => {
                        return response.json()
                    }).then(json => {
                        // Get Response Data From Nominatim
                        if(json.length > 0) return renderResults(json);
                        else {
                            resultsWrapperHTML.innerHTML = "<li>Location not found</li>";
                        }
                    });
                }
            }

            // Render Results
            function renderResults(result) {
                let resultsHTML = "";
                
                result.map((n) => {
                    let parsedDisplayName = n.display_name.replace(/^[^,]+,\s/, ''); // Menghapus kalimat pertama sebelum koma pertama
                    parsedDisplayName = parsedDisplayName.trim(); // Menghilangkan spasi di awal dan akhir

                    // Cek apakah di awal terdapat angka
                    if (/^\d/.test(parsedDisplayName.split(",")[0])) {
                        parsedDisplayName = parsedDisplayName.replace(/^\d+\,\s/, ''); // Menghapus angka di depan jika ada
                    }

                    resultsHTML += `<li><a href="#" onclick="setLocation('${n.name}', '${parsedDisplayName}', ${n.lat}, ${n.lon})">${n.display_name}</a></li>`;
                })
                
                resultsWrapperHTML.innerHTML = resultsHTML;
            }

            // Clear Results
            function clearResults() {
                resultsWrapperHTML.innerHTML = "";
            }

            // Set Location From Search Result
            function setLocation(name, address, lat, lon) {
                // Set Map Focus
                Map.setView(new L.LatLng(lat, lon), 18);
                
                // Regenerate Marker Position
                if (marker) {
                    Map.removeLayer(marker);
                }
                marker = L.marker([lat, lon]).addTo(Map);

                // Set input values
                document.getElementById('name').value = name;
                document.getElementById('address').value = address;
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;
                
                // Clear Results
                clearResults();
            }
        </script>

        <script type="text/javascript">
            $("#dataTableForm").submit(function(event){
                event.preventDefault();
                $("input[type=submit]").prop('disabled',true);
                $.ajax({
                    url: "{{ route('pages.management.locations.update', $location->id) }}",
                    data: $(this).serializeArray(),
                    method: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(response){
                        $("input[type=submit]").prop('disabled',false);
                        if(response.status == true) {
                            window.location.href="{{ route('pages.management.index') }}"; 
                        } else {
                            var errors = response.errors;
                            if (errors.name) {
                                $("#name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.name)
                            } else {
                                $("#name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.address) {
                                $("#address").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.address)
                            } else {
                                $("#address").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.latitude) {
                                $("#latitude").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.latitude)
                            } else {
                                $("#latitude").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.longitude) {
                                $("#longitude").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.longitude)
                            } else {
                                $("#longitude").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }
                        }
                    }
                });
            }) ;
        </script>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection