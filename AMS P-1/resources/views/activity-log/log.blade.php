                {{-- <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @forelse ($logs as $key => $log)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                {{-- <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapse-{{ $key }}">
                                <span>{{ $log->description }}</span> <small class="text-muted ms-2 pb-1">({{ $log->created_at->diffForHumans() }})</small>
                                </button> 
                            </h2>
                            <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($log->event == 'updated')
                                    <ul class="list-group">
                                        <li class="list-group-item bg-secondary text-white">Old Data</li>
                                        {{-- <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['old']['item'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['old']['manufacturer'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['old']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['old']['configuration_status'] }}</li> 
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['old']['location'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['old']['description'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['old']['created_at'] }}</li>
                                        <li class="list-group-item bg-secondary text-white">New Data</li>
                                        {{-- <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status'] }}</li> 
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['attributes']['updated_at'] }}</li>
                                    </ul>
                                    @elseif ($log->event == 'created')
                                    <ul class="list-group">
                                        <li class="list-group-item bg-secondary text-white">Data Created</li>
                                        {{-- <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item'] }}</li>
                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer'] }}</li>
                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status'] }}</li> 
                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location'] }}</li>
                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
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
                </div> --}}
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
                                <a href="{{ route('activity-log.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                                <h4 class="m-0">Details Log Asset Data</h4>
                              </div>
                              <div class="card-body">
                                @foreach($details as $key => $value)
                                    <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                @endforeach
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample">
                                        {{-- @forelse ($details as $key => $log)
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
                                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['old']['item'] }}</li>
                                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['old']['manufacturer'] }}</li>
                                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['old']['serial_number'] }}</li>
                                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['old']['configuration_status'] }}</li> 
                                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['old']['location'] }}</li>
                                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['old']['description'] }}</li>
                                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['old']['created_date'] }}</li>
                                                        <li class="list-group-item bg-secondary text-white">New Data</li>
                                                        <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item'] }}</li>
                                                        <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer'] }}</li>
                                                        <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                                        <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status'] }}</li> 
                                                        <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location'] }}</li>
                                                        <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
                                                        <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['attributes']['updated_date'] }}</li>
                                                    </ul> 
                                                    @if ($log->event == 'created')
                                                        <ul class="list-group">
                                                            <li class="list-group-item bg-secondary text-white">Data Created</li>
                                                            <li class="list-group-item"><strong>Item:</strong> {{ $log['properties']['attributes']['item'] }}</li>
                                                            <li class="list-group-item"><strong>Manufacturer:</strong> {{ $log['properties']['attributes']['manufacturer'] }}</li>
                                                            <li class="list-group-item"><strong>Serial Number:</strong> {{ $log['properties']['attributes']['serial_number'] }}</li>
                                                            <li class="list-group-item"><strong>Configuration Status:</strong> {{ $log['properties']['attributes']['configuration_status'] }}</li> 
                                                            <li class="list-group-item"><strong>Location:</strong> {{ $log['properties']['attributes']['location'] }}</li>
                                                            <li class="list-group-item"><strong>Description:</strong> {{ $log['properties']['attributes']['description'] }}</li>
                                                            <li class="list-group-item"><strong>Created Date:</strong> {{ $log['properties']['attributes']['created_date'] }}</li>
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
                                        @endforelse --}}
                                    </div>
                                </div>

                                {{-- <dl class="custom-dl mb-0">
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
                                        {{-- <dd>{{ $dynamic_data_table->manufacturer->name ?? '-' }}</dd>     
                
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
                                    </div>  --}}
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