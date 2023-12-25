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
            <h1 class="m-0">Column Management</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex align-items-center bg-secondary">
                    {{-- <a href="{{ route('dynamic-table.column-management.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a> --}}
                    <a href="#" onclick="history.back();" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                    <h4 class="mb-0">Edit Column</h4>
                </div>
                <div class="card-body">
                    <div>
                        <form method="POST" action="{{ route('dynamic-table.column-management.update', ['selected_column' => $selected_column]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="new_column_name">Column Name :</label><br>
                                <input type="text" id="new_column_name" name="new_column_name" value="{{ $selected_column }}" placeholder="New Column Name" class="form-control">
                            </div>
                            <div class="mt-4 float-right">
                                <a href="{{ route('dynamic-table.column-management.index') }}" class="btn btn-secondary mr-1">Cancel</a>
                                <button type="submit" class="btn btn-primary" value="save">Save Changes</button>
                            </div>
                        </form>
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