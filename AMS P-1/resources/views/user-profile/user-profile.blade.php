{{-- @extends('layouts.app')

@section('title', 'ASSET MANAGEMENT')
  
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">


              <!-- Profile Image -->
              <div class="card card-secondary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('/storage/images/' .Auth::user()->image) }}"
                        alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                  <p class="text-muted text-center">{{ Auth::user()->role }}</p>

                  <form action="{{ route('profiles.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf          
                            <div class="form-group row">
                                <div class="col-sm-12">
                                  <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror>

                                  @if($user->image)
                                      {{-- <img src="{{ asset('storage/images/'.$user->image) }}" style="height: 50px;width:100px; margin-top:5px;"> --}}
                                  @else 
                                      <span>No image found!</span>
                                  @endif
                                </div>
                                <div class="col-sm-12">
                                  <button type="submit" class="btn btn-outline-dark">Save Image</button>
                                </div>
                            </div>
                  </form>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>

            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Detail</h3>
                  </div>

                <form action="{{ route('profiles.update') }}" method="POST">
                  @csrf
                  @method('patch')

                  <!-- /.card-header -->
                  <div class="card-body">
            
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="telp" value="{{ Auth::user()->telp }}" placeholder="{{ Auth::user()->no_telpon }}">
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-outline-dark">Save Changes</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    
                  </div>
                  <!-- /.card-body -->
                </form>

              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  {{-- <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}

@endsection

<!-- jQuery -->
<script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTEplugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>

{{-- <!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script> --}}

</body>
</html> --}}
