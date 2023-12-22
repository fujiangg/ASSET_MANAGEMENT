@extends('dashboards.Message.layouts.message-dash-layout')
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
                <form action="{{ route('simpanmessage') }}" method="post" enctype="multipart/form-data">
                  @csrf
                     <div class="form-group">
                      <label for="websitelogo" class="form-label">Full Name</label>
                      <input type="text" id="fullname" name="fullname" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="websiteimage" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control">
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Message</label>
                        <input type="text" id="message" name="message" class="form-control">
                       </div>
                       <div class="form-group">
{{-- 
                        <label for="foto" class="form-label">Foto</label>
                        <div class="input-group mb-3">
                          <input type="file" name="foto" class="form-control" id="inputGroupFile">
                          <label for="inputGroupFile" class="input-group-text">Upload</label>
                        </div>

                        <label for="no_ktp" class="form-label">KTP</label>
                        <div class="input-group mb-3">
                          <input type="file" name="no_ktp" class="form-control" id="inputGroupFile">
                          <label for="inputGroupFile" class="input-group-text">Upload</label>
                        </div> --}}
                        
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