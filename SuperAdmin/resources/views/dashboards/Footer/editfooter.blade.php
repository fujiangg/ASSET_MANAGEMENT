@extends('dashboards.Footer.layouts.footer-dash-layout')
@section('title','Dashboard')

@section('content')

   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>EDIT FOOTER</h1>
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
                <form action="{{ route('updatefooter', $dt->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Website Logo</label>
                    <input type="file" id="websitelogo" name="websitelogo" class="form-control" value="{{ $dt->websitelogo }}">
                    @error('websitelogo')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                   </div>
                   <div class="form-group">
                    <img class="table-active" src="{{asset('FooterImages/'.$dt->websitelogo)}}" width="200px" alt="" srcset="">
                 </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Location Address</label>
                      <input type="text" id="locationaddress" name="locationaddress" class="form-control" value="{{ $dt->locationaddress }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Copyright Page</label>
                      <input type="text" id="copyrightpage" name="copyrightpage" class="form-control" value="{{ $dt->copyrightpage }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Privacy Policy Page</label>
                      <input type="text" id="privacypolicypage" name="privacypolicypage" class="form-control" value="{{ $dt->privacypolicypage }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Terms Of Use Page</label>
                      <input type="text" id="termsofusepage" name="termsofusepage" class="form-control" value="{{ $dt->termsofusepage }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Copyright</label>
                      <input type="text" id="copyright" name="copyright" class="form-control" value="{{ $dt->copyright }}">
                     </div>
                     <div class="form-group">
                      <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Changes Data
                      </button>
                      <a href="{{ url('datafooter') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                      </a>
                 </div>
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