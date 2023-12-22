@extends('dashboards.ContactUs.layouts.contactus-dash-layout')
@section('title','Dashboard')

@section('content')
      <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>EDIT CONTACT US PAGE (CARD 1)</h1>
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
              <form action="{{ route('updatecontactuscard1', $dt->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Card Title</label>
                    <input type="text" id="cardtitle" name="cardtitle" class="form-control" value="{{ $dt->cardtitle }}">
                   </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Card Description</label>
                      <input type="text" id="carddescription" name="carddescription" class="form-control" value="{{ $dt->carddescription }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Day</label>
                      <input type="text" id="day" name="day" class="form-control" value="{{ $dt->day }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Time</label>
                      <input type="text" id="time" name="time" class="form-control" value="{{ $dt->time }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                      <input type="text" id="phonenumber" name="phonenumber" class="form-control" value="{{ $dt->phonenumber }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Email Address</label>
                      <input type="email" id="emailaddress" name="emailaddress" class="form-control" value="{{ $dt->emailaddress }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Location Address</label>
                      <input type="text" id="locationaddress" name="locationaddress" class="form-control" value="{{ $dt->locationaddress }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Facebook Link</label>
                      <input type="text" id="facebooklink" name="facebooklink" class="form-control" value="{{ $dt->facebooklink }}">
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Twitter Link</label>
                      <input type="text" id="twitterlink" name="twitterlink" class="form-control" value="{{ $dt->twitterlink }}">
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
                      <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Changes Data
                      </button>
                      <a href="{{ url('datacontactus') }}" class="btn btn-secondary">
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

