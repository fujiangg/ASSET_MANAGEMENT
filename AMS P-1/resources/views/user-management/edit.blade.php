@extends('layouts.app')

@section('title', 'USER MANAGEMENT')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
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
                        <a href="{{ route('user-management.index') }}" class="text-dark"><i class="fa-solid fa-chevron-left mr-2 mt-2"></i></a>
                        <h4 class="m-0">Edit User Data</h4>
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
                                    <label for="role_name">Role</label>
                                    <select name="role_name" id="role_name" class="form-control">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($role_names as $option)
                                            @if ($option->id !== 1)
                                                <option value="{{ $option->id }}" {{ $user->role_name == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $user->name }}"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ $user->email }}"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{ $user->phone }}"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="old_password">Old Password</label>
                                    <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control"></input>
                                    <p></p>
                                </div>
                                <div>
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control"></input>
                                    <p></p>
                                </div>
                                <div class="mt-4 float-right">
                                    <a href="{{ route('user-management.index') }}" class="btn btn-secondary mr-1">Cancel</a>
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
                    url: "{{ route('user-management.update', $user->id) }}",
                    data: $(this).serializeArray(),
                    method: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(response){
                        $("input[type=submit]").prop('disabled',false);
                        if(response.status == true) {
                            window.location.href="{{ route('user-management.index') }}"; 
                        } else {
                            var errors = response.errors;
                            if (errors.role_name) {
                                $("#role_name").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.role_name)
                            } else {
                                $("#role_name").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

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

                            if (errors.email) {
                                $("#email").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.email)
                            } else {
                                $("#email").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.phone) {
                                $("#phone").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.phone)
                            } else {
                                $("#phone").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.old_password) {
                                $("#old_password").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.old_password)
                            } else {
                                $("#old_password").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.new_password) {
                                $("#new_password").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.new_password)
                            } else {
                                $("#new_password").removeClass('is-invalid')
                                .siblings("p")
                                .removeClass('invalid-feedback')
                                .html("")
                            }

                            if (errors.confirm_password) {
                                $("#confirm_password").addClass('is-invalid')
                                .siblings("p")
                                .addClass('invalid-feedback')
                                .html(errors.confirm_password)
                            } else {
                                $("#confirm_password").removeClass('is-invalid')
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