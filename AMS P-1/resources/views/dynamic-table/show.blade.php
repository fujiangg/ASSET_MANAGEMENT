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
                <h4 class="m-0">Details Asset Data</h4>
              </div>
              <div class="card-body">
                <dl class="custom-dl mb-0">
                    @foreach ($item_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        @php
                            $item = \App\Models\Item::find($dynamic_data_table[$item]);
                        @endphp
                        <dd class="col-sm-10">{{ $item->name ?? '-'  }}</dd>
                        
                    @foreach ($manufacturer_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        @php
                            $item = \App\Models\Manufacturer::find($dynamic_data_table[$item]);
                        @endphp
                        <dd class="col-sm-10">{{ $item->name ?? '-'   }}</dd>
                        {{-- <dd>{{ $dynamic_data_table->manufacturer->name ?? '-' }}</dd>     --}}

                    @foreach ($serial_number_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        <dd class="col-sm-10">{{ $dynamic_data_table->{ reset($serial_number_column) } ?? '-' }}</dd>    

                    @foreach ($configuration_status_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        @php
                            $item = \App\Models\ConfigurationStatus::find($dynamic_data_table[$item]);
                        @endphp
                        <dd class="col-sm-10">{{ $item->name ?? '-'   }}</dd>

                    @foreach ($location_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        @php
                            $item = \App\Models\Location::find($dynamic_data_table[$item]);
                        @endphp
                        <dd class="col-sm-10">{{ $item->name ?? '-'   }}</dd>

                    @foreach ($description_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        <dd class="col-sm-10">{{ $dynamic_data_table->{ reset($description_column) } ?? '-' }}</dd>    

                    @foreach ($position_status_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item ?? '-'   }}</dt>
                    @endforeach
                        @php
                            $item = \App\Models\PositionStatus::find($dynamic_data_table[$item]);
                        @endphp
                        <dd class="col-sm-10">{{ $item->name ?? '-'   }}</dd>
                        
                    @foreach ($created_date_column as $item)
                        <dt class="col-sm-2 pl-0">{{ $item }}</dt>
                    @endforeach
                        <dd class="col-sm-10">{{ $dynamic_data_table->{ reset($created_date_column) } ?? '-' }}</dd>    
                </dl>
                    <div class="card-columns">
                      @foreach($dynamic_data_table_images as $image)
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