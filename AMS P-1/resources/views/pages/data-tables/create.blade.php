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
                        <h4 class="m-0">Create New Asset Data</h4>
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
                            <form method="post" name="dataTableForm" id="dataTableForm" action="">
                                @csrf
                                @method('post')
                                <div>
                                    <label for="item_name">Item</label>
                                    <select name="item_name" id="item_name" class="form-control">
                                        <option selected disabled>Select Item</option>
                                        @foreach ($item_names as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="manufacturer_name">Manufacturer</label>
                                    <select name="manufacturer_name" id="manufacturer_name" class="form-control">
                                        <option selected disabled>Select Manufacturer</option>
                                        @foreach ($manufacturer_names as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="serial_number">Serial Number</label>
                                    <input type="text" name="serial_number" id="serial_number" placeholder="Serial Number" class="form-control"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="configuration_status_name">Configuration Status</label>
                                    <select name="configuration_status_name" id="configuration_status_name" class="form-control">
                                        <option selected disabled>Select Configuration Status</option>
                                        @foreach ($configuration_status_names as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="location_name">Location</label>
                                    <select name="location_name" id="location_name" class="form-control">
                                        <option selected disabled>Select Location</option>
                                        @foreach ($location_names as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" id="description" placeholder="Description" class="form-control"></textarea>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="position_status_name">Position Status</label>
                                    <select name="position_status_name" id="position_status_name" class="form-control">
                                        <option selected disabled>Select Position Status</option>
                                        @foreach ($position_status_names as $option)
                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
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
                                </div>
                                <div class="mt-4 float-right">
                                    <a href="{{ route('pages.data-tables.index') }}" class="btn btn-secondary mr-1">Cancel</a>
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
            Dropzone.autoDiscover = false;
            const dropzone = $("#image").dropzone({ 
                uploadprogress: function(file, progress, bytesSent) {
                    $("input[type=submit]").prop('disabled',true);
                },
                url:  "{{ route('pages.data-tables.temp-images.store') }}",
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
                    url: "{{ route('pages.data-tables.store') }}",
                    data: $(this).serializeArray(),
                    method: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(response){
                        $("input[type=submit]").prop('disabled',false);
                        if(response.status == true) {
                            window.location.href="{{ route('pages.data-tables.index') }}"; 
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
            })

            function deleteImage(id){
                if (confirm("Are you sure you want to delete?")) {
                    $("#data-table-image-row-"+id).remove();
                    var successAlert = '<div class="alert alert-success">Image deleted successfully.</div>';
                    $("#successAlert").html(successAlert);
                }
            }
        </script>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection