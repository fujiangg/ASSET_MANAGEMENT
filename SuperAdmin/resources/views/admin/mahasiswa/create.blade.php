<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('/mahasiswa/store') }}" method="POST">
           @csrf
          <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="Nama lengkap" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="jenkel">pilih jenis kelamin</label>
                <select name="jenkel" id="" class="custom-select rounded-0">
                    <option selected="">pilih jenis kelamin</option> 
                    <option value="pria">pria</option> 
                    <option value="wanita">wanita</option> 
                </select>
              </div>
              <label for="alamat" class="form-label">alamat</label>
              <div class="form-floating">
              <textarea name="alamat" id="floatingTextArea" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label for="hp">No Hp</label>
                <input type="number" name="hp" class="form-control" placeholder="+62">
              </div>

              <div class="form-group">
                <label for="jurusan">Pilih Jurusan</label>
                <select name="jurusan" id="" class="custom-select rounded-0">
                    <option selected="">pilih jurusan</option> 
                    <option value="sistem informasi">sistem informasi</option> 
                    <option value="informatika">informatika</option>
                </select>
              </div>



            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
        </form>
    </div>
  </body>
</html>

