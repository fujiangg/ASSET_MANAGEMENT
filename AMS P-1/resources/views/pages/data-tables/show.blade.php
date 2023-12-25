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
              <div class="card-header d-flex align-items-center">
                <a href="{{ route('pages.data-tables.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                <h4 class="m-0">Details Asset Data</h4>
              </div>
              <div class="card-body">
                <dl class="custom-dl mb-0">
                  <dt class="col-sm-2 pl-0">Item</dt>
                  <dd class="col-sm-10">{{ $data_table->item->name ?: '-' }}</dd>

                  <dt class="col-sm-2 pl-0">Manufacturer</dt>
                  <dd class="col-sm-10">{{ $data_table->manufacturer->name ?: '-' }}</dd>

                  <dt class="col-sm-2 pl-0">Serial Number</dt>
                  <dd class="col-sm-10">{{ $data_table->serial_number ?: '-' }}</dd>

                  <dt class="col-sm-2 pl-0">Configuration Status</dt>
                  <dd class="col-sm-10">{{ $data_table->configurationStatus->name ?: '-' }}</dd>

                  <dt class="col-sm-2 pl-0">Location</dt>
                  <dd class="col-sm-10">{{ $data_table->location->name ?: '-' }}</dd>

                  <dt class="col-sm-2 pl-0">Description</dt>
                  <dd class="col-sm-10">{{ $data_table->description ?: '-' }}</dd>

                  <dt class="col-sm-2 pl-0">Position Status</dt>
                  <dd class="col-sm-10">{{ $data_table->positionStatus->name ?: '-' }}</dd>
                </dl>
                <div class="card-columns">
                  @foreach($data_tableImages as $image)
                      <div class="card mt-3">
                          <img src="{{ asset('uploads/data_tables/small/'.$image->name) }}" class="card-img-top" alt="Image">
                          <div class="card-body">
                              <label for="caption">Image Description :</label>
                              <p class="card-text" id="caption">{{ $image->caption ?: 'No description' }}</p>
                          </div>
                      </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection