@extends('dashboards.AboutUs.layouts.aboutus-dash-layout')
@section('title','Dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ADD NEW MEMBER</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Konten utama -->
<div class="content">
    <div class="card card-info card-outline">
        <div class="card-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <form action="{{ route('saveaboutusteam') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" id="fullname" name="fullname" class="form-control">
                                @error('fullname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jobposition" class="form-label">Posisi Pekerjaan</label>
                                <input type="text" id="jobposition" name="jobposition" class="form-control">
                                @error('jobposition')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="instagramlink" class="form-label">Tautan Instagram</label>
                                <input type="text" id="instagramlink" name="instagramlink" class="form-control">
                                @error('instagramlink')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="linkedinlink" class="form-label">Tautan Linkedin</label>
                                <input type="text" id="linkedinlink" name="linkedinlink" class="form-control">
                                @error('linkedinlink')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="profilepicture" class="form-label">Foto Profil</label>
                                <input type="file" id="profilepicture" name="profilepicture" class="form-control">
                                @error('profilepicture')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Save Data
                              </button>
                              <a href="{{ url('dataaboutus') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                              </a>
                            </div>
                        </form>
                    </div>
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
