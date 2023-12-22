@extends('dashboards.Home.layouts.home-dash-layout')
@section('title','Dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
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
                <form action="{{ route('savehome') }}" method="post" enctype="multipart/form-data">
                  @csrf
                        <label for="websitelogo" class="form-label">Website Logo</label>
                        <div class="input-group mb-3">
                          <input type="file" name="websitelogo" class="form-control" id="inputGroupFile">
                          <label for="inputGroupFile" class="input-group-text">Upload</label>
                        </div>
                        <label for="websiteimage" class="form-label">Website Image</label>
                        <div class="input-group mb-3">
                          <input type="file" name="websiteimage" class="form-control" id="inputGroupFile">
                          <label for="inputGroupFile" class="input-group-text">Upload</label>
                        </div>
                        <div class="form-group">
                            <label for="greetingsword" class="form-label">Grettings Words</label>
                            <input type="text" id="greetingsword" name="greetingsword" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="websitedescription" class="form-label">Website Description</label>
                              <input type="text" id="websitedescription" name="websitedescription" class="form-control">
                             </div>
                   <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan data</button>
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