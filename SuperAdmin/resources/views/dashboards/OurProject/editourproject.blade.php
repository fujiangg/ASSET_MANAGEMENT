@extends('dashboards.Ourproject.layouts.ourproject-dash-layout')
@section('title','Dashboard')

@section('content')

      <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> EDIT OUR PROJECT PAGE</h1>
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
              <form action="{{ route('updateourproject', $dt->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Project Name</label>
                    <input type="text" id="projectname" name="projectname" class="form-control" value="{{ $dt->projectname }}">
                   </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Project Description</label>
                      <input type="text" id="projectdescritpion" name="projectdescription" class="form-control" value="{{ $dt->projectdescription }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Project Detail</label>
                      <input type="text" id="projectdetail" name="projectdetail" class="form-control" value="{{ $dt->projectdetail }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Project image</label>
                      <input type="file" id="projectimage" name="projectimage" class="form-control" value="{{ $dt->projectimage }}">
                      @error('projectimage')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                     </div>
                 <div class="form-group">
                    <img src="{{asset('OurProjectImages/'.$dt->projectimage)}}" width="200px" alt="" srcset="">
                 </div>
                 <div class="form-group">
                  <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Changes Data
                  </button>
                  <a href="{{ url('dataourproject') }}" class="btn btn-secondary">
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

