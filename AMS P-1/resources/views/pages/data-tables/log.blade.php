@extends('layouts.app')

@section('title', 'ASSET MANAGEMENT')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Activity Log</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @forelse ($logs as $key => $log)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                                <span>{{ $log->description }}</span> <small class="text-muted ms-2 pb-1">({{ $log->created_at->diffForHumans() }})</small>
                                </button>
                            </h2>
                            <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($log->event == 'updated')
                                    <ul class="list-group">
                                        <li class="list-group-item bg-secondary text-white">Old Data</li>
                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['old']['item_name'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['old']['manufacturer_name'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['old']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['old']['configuration_status_name'] }}</li>
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['old']['location_name'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['old']['description'] }}</li>
                                        <li class="list-group-item"><strong>Position Status:</strong> {{ $log['properties']['old']['position_status_name'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['old']['created_at'] }}</li>
                                        <li class="list-group-item bg-secondary text-white">New Data</li>
                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item_name'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer_name'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status_name'] }}</li>
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location_name'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
                                        <li class="list-group-item"><strong>Position Status:</strong> {{ $log['properties']['attributes']['position_status_name'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['attributes']['updated_at'] }}</li>
                                    </ul>
                                    @elseif ($log->event == 'created')
                                    <ul class="list-group">
                                        <li class="list-group-item bg-secondary text-white">Data Created</li>
                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item_name'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer_name'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status_name'] }}</li>
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location_name'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
                                        <li class="list-group-item"><strong>Position Status:</strong> {{ $log['properties']['attributes']['position_status_name'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['attributes']['created_at'] }}</li>
                                    </ul>
                                    
                                    @else
                                    {{ $log->description }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-" aria-expanded="true" aria-controls="collapse-">
                                No activity found.
                                </button>
                            </h2>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
      </section>
  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

@endsection

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script> --}}

</body>
</html>