@extends('dashboards.AboutUs.layouts.aboutus-dash-layout')
@section('title','Dashboard')

@section('content')

      <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>EDIT ABOUT US TEAM PAGE</h1>
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
              <form action="{{ route('updateaboutusteam', $dt->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $dt->fullname }}">
                   </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Job Position</label>
                      <input type="text" id="jobposition" name="jobposition" class="form-control" value="{{ $dt->jobposition }}">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Instagram Link</label>
                        <input type="text" id="instagramlink" name="instagramlink" class="form-control" value="{{ $dt->instagramlink }}">
                       </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Linkedin Link</label>
                        <input type="text" id="linkedinlink" name="linkedinlink" class="form-control" value="{{ $dt->linkedinlink }}">
                       </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                      <input type="file" id="profilepicture" name="profilepicture" class="form-control" value="{{ $dt->profilepicture }}">
                      @error('profilepicture')
                                <span class="text-danger">{{ $message }}</span>
                      @enderror
                     </div>
                 <div class="form-group">
                    <img src="{{asset('AboutUsImages/'.$dt->profilepicture)}}" width="200px" alt="" srcset="">
                 </div>
                 <div class="form-group">
                  <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Changes Data
                  </button>
                  <a href="{{ url('dataaboutus') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                  </a>
              </form>
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

