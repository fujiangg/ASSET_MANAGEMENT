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
              <form action="{{ route('updatemessage', $dt->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $dt->fullname }}">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1" class="form-label">Email Address</label>
                  <input type="text" id="email" name="email" class="form-control" value="{{ $dt->email }}">
                 </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1" class="form-label">Subject</label>
                  <input type="text" id="subject" name="subject" class="form-control" value="{{ $dt->subject }}">
                 </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1" class="form-label">Message</label>
                  <input type="text" id="message" name="message" class="form-control" value="{{ $dt->message }}">
                 </div>
                 {{-- <div class="form-group">
                  <label for="exampleInputEmail1" class="form-label">Foto</label>
                  <input type="file" id="foto" name="foto" class="form-control" value="{{ $dt->foto }}">
                 </div>
             <div class="form-group">
                <img src="{{asset('testimg/'.$dt->foto)}}" width="40px" alt="" srcset="">
             </div>
             <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">KTP</label>
              <input type="file" id="no_ktp" name="no_ktp" class="form-control" value="{{ $dt->no_ktp }}">
             </div>
         <div class="form-group">
            <img src="{{asset('testimg/'.$dt->no_ktp)}}" width="40px" alt="" srcset="">
         </div> --}}
               <div class="form-group">
                <button type="submit" class="btn btn-success">Ubah data</button>
               </div>
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