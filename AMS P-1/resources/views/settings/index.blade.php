@extends('layouts.app')

@section('title', 'CUSTOMIZE DASHBOARD')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customize Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                  <h4 class="mb-0">Change Dashboard Name</h4>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
            
                    <form action="{{ route('customize-dashboard.update') }}" method="POST">
                        @csrf
                        @method('POST')


                            <div class="form-group">
                                <label for="dashboard_name">Dashboard Name :</label>
                                <input type="text" class="form-control" id="dashboard_name" name="dashboard_name" value="{{ $setting_title->dashboard_name ?? '' }}">
                            </div>
                            <div class="mt-4 float-right">
                              <button type="submit" class="btn btn-primary" value="save">Save Change</button>
                            </div>
                    </form>    
                </div>    

        <!-- TABLE: LATEST ORDERS -->
        {{-- <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="m-0">Dashboard Identition</h4>
                  </div>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                            <th>No</th>
                            <th>Project Title</th>
                            <th>Project Logo</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @if($users->isNotEmpty()) 
                        <?php $no=1 ?>
                        @foreach($project_title as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->project_title }}</td>
                                <td>{{ $item->project_logo }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('customize-dashboard.edit', $item->id) }}" class="btn btn-warning btn-sm text-white mb-2 mr-1"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @endif 
                      </tbody>
                    </table>
                  </div>
    
            </div>
          </div>
        </div> --}}
        <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection