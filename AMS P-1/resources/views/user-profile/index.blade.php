@extends('layouts.app')

@section('title', 'USER PROFILE')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Picture -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center mb-4 mt-4">
                  <img class="profile-user-img img-fluid img-circle picture" src="{{ Auth::user()->picture }}" alt="User Profile Picture">
                </div>

                <h3 class="profile-username text-center mb-2 name">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center mb-4">{{ Auth::user()->role->name }}</p>

                <input type="file" name="picture" id="picture" style="opacity: 0; display:none;">
                <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change-profile-picture"><b>Change Profile Picture</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#personal-information" data-toggle="tab">Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#change-password" data-toggle="tab">Change Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="personal-information">
                    <form class="form-horizontal" method="POST" action="{{ route('user-profile.update-personal-information') }}" id="personal-information-form">
                      @csrf
                      @method('post')
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{ Auth::user()->name }}">
                          <span class="text-danger error-text name_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email address" value="{{ Auth::user()->email }}">
                          <span class="text-danger error-text email_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" value="{{ Auth::user()->phone }}">
                          <span class="text-danger error-text phone_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Save Changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="change-password">
                    <form class="form-horizontal" method="POST" action="{{ route('user-profile.change-password') }}" id="change-password-form">
                      @csrf
                      @method('post')
                      <div class="form-group row">
                        <label for="old-password" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Enter the current password">
                          <span class="text-danger error-text old_password_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="new-password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="new_password" id="new-password" placeholder="Enter a new password">
                          <span class="text-danger error-text new_password_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder="Reenter a new password">
                          <span class="text-danger error-text confirm_password_error"></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

        <!-- ijaboCropTool -->
        <script src="{{ asset('adminlte/plugins/ijabo-crop-tool/ijaboCropTool.min.js') }}"></script>

        <script>
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $(function(){
                $('#personal-information-form').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
                        url:$(this).attr('action'),
                        method:$(this).attr('method'),
                        data:new FormData(this),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(document).find('span.error-text').text('');
                        },
                        success:function(data){
                            if(data.status == 0){
                                $.each(data.error, function(prefix, val){
                                    $('span.'+prefix+'_error').text(val[0]);
                                });
                            }else{
                                $('.name').each(function(){
                                  $(this).html( $('#personal-information-form').find( $('input[name="name"]') ).val() );
                                });
                                alert(data.msg)
                            }
                        }

                    });
                });

                $(document).on('click', '#change-profile-picture', function(){
                  $('#picture').click();
                });

                $('#picture').ijaboCropTool({
                    preview : '.picture',
                    setRatio:1,
                    allowedExtensions: ['jpg', 'jpeg','png'],
                    buttonsText:['SAVE','CANCEL'],
                    buttonsColor:['#28a745','#dc3545', -15],
                    processUrl:'{{ route("user-profile.change-profile-picture") }}',
                    withCSRF:['_token','{{ csrf_token() }}'],
                    onSuccess:function(message, element, status){
                      alert(message);
                    },
                    onError:function(message, element, status){
                      alert(message);
                    }
                });

                $('#change-password-form').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
                        url:$(this).attr('action'),
                        method:$(this).attr('method'),
                        data:new FormData(this),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(document).find('span.error-text').text('');
                        },
                        success:function(data){
                            if(data.status == 0){
                                $.each(data.error, function(prefix, val){
                                    $('span.'+prefix+'_error').text(val[0]);
                                });
                            }else{
                                $('#change-password-form')[0].reset();
                                alert(data.msg)
                            }
                        }
                    });
                });
            });
        </script>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection