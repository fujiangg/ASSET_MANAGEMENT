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
                        @foreach ($item_column as $column)
                            <h4 class="m-0">Edit {{ $column }} Data</h4>                           
                        @endforeach
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
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{$item->name}}"></input>
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

        <script type="text/javascript">
            $("#dataTableForm").submit(function(event){
                event.preventDefault();
                $("input[type=submit]").prop('disabled',true);
                $.ajax({
                    url: "{{ route('pages.management.items.update', $item->id) }}",
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