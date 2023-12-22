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
                        <h4 class="m-0">Edit Asset Data</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            {{-- <form method="post" name="dataTableForm" id="dataTableForm" action="">
                                @csrf
                                @method('post') --}}
                                <form method="POST" action="{{ route('dynamic-table.update', ['id' => $dynamic_data_table->id]) }}">
                                    @csrf
                                    @method('POST')
                                    @foreach ($item_column as $item)
                                        <div>
                                            <label for={{ $item }}>{{ $item }}</label>
                                            <select name={{ $item }} id={{ $item }} class="form-control">
                                                <option selected disabled>Select {{ $item }}</option>
                                                @foreach ($item_names as $option)
                                                    <option value="{{ $option->id }}" {{ $dynamic_data_table->$item == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    @endforeach
                                    @foreach ($manufacturer_column as $item)
                                        <div>
                                            <label for={{ $item }}>{{ $item }}</label>
                                            <select name={{ $item }} id={{ $item }} class="form-control">
                                                <option selected disabled>Select {{ $item }}</option>
                                                @foreach ($manufacturer_names as $option)
                                                    <option value="{{ $option->id }}" {{ $dynamic_data_table->$item == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    @endforeach
                                    @foreach ($serial_number_column as $item)
                                      <div class="form-group">
                                          <label for="{{ $item }}">{{ $item }}</label><br>
                                          <input type="text" id="{{ $item }}" name="{{ $item }}" value="{{ $dynamic_data_table->$item }}" placeholder="Update {{ $item }}" class="form-control">
                                      </div>
                                    @endforeach
                                    @foreach ($configuration_status_column as $item)
                                        <div>
                                            <label for={{ $item }}>{{ $item }}</label>
                                            <select name={{ $item }} id={{ $item }} class="form-control">
                                                <option selected disabled>Select {{ $item }}</option>
                                                @foreach ($configuration_status_names as $option)
                                                    <option value="{{ $option->id }}" {{ $dynamic_data_table->$item == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    @endforeach
                                    @foreach ($location_column as $item)
                                        <div>
                                            <label for={{ $item }}>{{ $item }}</label>
                                            <select name={{ $item }} id={{ $item }} class="form-control">
                                                <option selected disabled>Select {{ $item }}</option>
                                                @foreach ($location_names as $option)
                                                    <option value="{{ $option->id }}" {{ $dynamic_data_table->$item == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    @endforeach
                                    @foreach ($description_column as $item)
                                      <div class="form-group">
                                          <label for="{{ $item }}">{{ $item }}</label><br>
                                          <input type="text" id="{{ $item }}" name="{{ $item }}" value="{{ $dynamic_data_table->$item }}" placeholder="Update {{ $item }}" class="form-control">
                                      </div>
                                    @endforeach
                                    @foreach ($position_status_column as $item)
                                        <div>
                                            <label for={{ $item }}>{{ $item }}</label>
                                            <select name={{ $item }} id={{ $item }} class="form-control">
                                                <option selected disabled>Select {{ $item }}</option>
                                                @foreach ($position_status_names as $option)
                                                    <option value="{{ $option->id }}" {{ $dynamic_data_table->$item == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    @endforeach
                                    <div>
                                        <label for="image">Upload Image</label>
                                        <div id="image" class="dropzone dz-clickable">
                                            <div class="dz-message needsclick">
                                                <br>Drop files here or click to upload.
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="image-wrapper">
                                        @if($dynamic_data_table_images->isNotEmpty())
                                            @foreach($dynamic_data_table_images as $data_tableImage)
                                                <div class="col-md-3 mt-4" id="data-table-image-row-{{ $data_tableImage->image }}">
                                                    <div class="card image-card">
                                                        <a href="#" onclick="deleteImage('{{ $data_tableImage->id }}');" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                        <img src="{{ asset('uploads/data_tables/small/'.$data_tableImage->name) }}" alt="" class="w-100 card-img-top">
                                                        <div class="card-body">
                                                            <input type="text" name="caption[]" id="caption" value="{{ $data_tableImage->caption }}" class="form-control" />
                                                            <input type="hidden" name="image_id[]" id="image_id" value="{{ $data_tableImage->id }}" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>    
                                    {{-- @foreach ($visible_new_columns as $item)
                                        <div class="form-group">
                                            <label for="{{ $item }}">{{ $item }}</label><br>
                                            <input type="text" id="{{ $item }}" name="{{ $item }}" value="{{ $dynamic_data_table->$item }}" placeholder="Update {{ $item }}" class="form-control">
                                        </div>
                                    @endforeach --}}
                                    <div class="mt-4 float-right">
                                        <a href="{{ route('dynamic-table.index') }}" class="btn btn-secondary mr-1">Cancel</a>
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

        <!-- Dropzone -->
        <script src="{{ asset('adminlte/plugins/dropzone/dropzone.min.js') }}"></script>

        <script type="text/javascript">
            var dynamic_data_table_id = '{{ $dynamic_data_table->id }}';
            Dropzone.autoDiscover = false;
            const dropzone = $("#image").dropzone({ 
                uploadprogress: function(file, progress, bytesSent) {
                    $("input[type=submit]").prop('disabled',true);
                },
                url:  "{{ route('pages.data-tables.data-table-images.store') }}",
                params: {dynamic_data_table_id: dynamic_data_table_id},
                maxFiles: 10,
                paramName: 'image',
                addRemoveLinks: true,
                acceptedFiles: "image/jpg,image/jpeg,image/png,image/gif",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }, success: function(file, response){
                        var html = `<div class="col-md-3 mt-4" id="data-table-image-row-${response.image_id}">
                                        <div class="card image-card">
                                            <a href="#" onclick="deleteImage(${response.image_id});" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            <img src="${response.imagePath}" alt="" class="w-100 card-img-top">
                                            <div class="card-body">
                                                <input type="text" name="caption[]" id="caption" value="" class="form-control" />
                                                <input type="hidden" name="image_id[]" id="image_id" value="${response.image_id}" />
                                            </div>
                                        </div>
                                    </div>`; 
                        $("#image-wrapper").append(html);
                        $("input[type=submit]").prop('disabled',false);
                    this.removeFile(file);            
                }
            });

            $("#dataTableForm").submit(function(event){
                event.preventDefault();
                $("input[type=submit]").prop('disabled',true);
                $.ajax({
                    url: "{{ route('dynamic-table.update', $dynamic_data_table->id) }}",
                    data: $(this).serializeArray(),
                    method: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(response){
                        $("input[type=submit]").prop('disabled',false);
                        if(response.status == true) {
                            window.location.href="{{ route('dynamic-table.index') }}"; 
                        } else {
                            var errors = response.errors;
                            if (errors.item_name) {
                                $("#item_name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.item_name)
                            } else {
                                $("#item_name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.manufacturer_name) {
                                $("#manufacturer_name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.manufacturer_name)
                            } else {
                                $("#manufacturer_name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.serial_number) {
                                $("#serial_number").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.serial_number)
                            } else {
                                $("#serial_number").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.configuration_status_name) {
                                $("#configuration_status_name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.configuration_status_name)
                            } else {
                                $("#configuration_status_name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.location_name) {
                                $("#location_name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.location_name)
                            } else {
                                $("#location_name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.description) {
                                $("#description").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.description)
                            } else {
                                $("#description").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.position_status_name) {
                                $("#position_status_name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.position_status_name)
                            } else {
                                $("#position_status_name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }
                        }
                    }
                });
            }) ;
            
            function deleteImage(id){
                if (confirm("Are you sure you want to delete?")) {
                    var URL = "{{ route('pages.data-tables.data-table-images.destroy','ID') }}";
                    newURL = URL.replace('ID',id)

                    $("#data-table-image-row-"+id).remove();

                    $.ajax({
                        url: newURL,
                        data: {},
                        method: 'delete',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(response){
                            window.location.href='{{ route("dynamic-table.edit",$dynamic_data_table->id) }}';
                        }
                    });
                }
            }
        </script>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection