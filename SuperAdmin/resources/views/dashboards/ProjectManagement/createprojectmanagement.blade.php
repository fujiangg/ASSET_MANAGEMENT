@extends('dashboards.ProjectManagement.layouts.projectmanagement-dash-layout')
@section('title','Dashboard')

@section('content')


 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ADD NEW DASHBOARD</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
      <!-- Main content -->
      <div class="content">
        <div class="card card-info card-outline">
          <div class="card-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-8">
                <form action="{{ route('simpanprojectmanagement') }}" method="post" enctype="multipart/form-data">
                  @csrf
                     <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Project Name</label>
                        <input type="text" id="projectname" name="projectname" class="form-control">
                        @error('projectname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Project User</label>
                        <input type="text" id="projectuser" name="projectuser" class="form-control">
                        @error('projectuser')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Project Deadline</label>
                        <input type="date" id="projectdeadline" name="projectdeadline" class="form-control">
                        @error('projectdeadline')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                       </div>
                       <div class="form-group">
                        <button type="submit" class="btn btn-success">
                          <i class="fas fa-save"></i> Save Data
                        </button>
                        <a href="{{ url('dataprojectmanagement') }}" class="btn btn-secondary">
                          <i class="fas fa-arrow-left"></i> Back
                        </a>
                   </div>
                </form>
              </div>
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection