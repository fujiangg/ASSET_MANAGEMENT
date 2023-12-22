@extends('dashboards.Footer.layouts.footer-dash-layout')
@section('title','Dashboard')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>FOOTER</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="">
          <div class=" card card-info card-outline">
              <div class="card-header">
                  {{-- 1<a href="{{ route('createfooter') }}" class="btn btn-success  mt-2 mb-3 ">Tambah <i class="fas fa-plus-square"></i></a> --}}
                        <table id="" class="table table-bordered tbale-hover">
                        <thead>
                        <tr>
                        <th>Website logo</th>
                        <th>Location Address</th>
                        <th>Copyright Page</th>
                        <th>Privacy Policy Page</th>
                        <th>Terms Of Use Page</th>
                        <th>Copyright</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach ($dataFooter as $item)
                          <tr>
                            <td>
                                <img class="table-active" src ="{{asset('FooterImages/'.$item->websitelogo)}}" width="200px" alt="" srcset="">
                            </td>
                              <td>{{ $item->locationaddress }}</td>
                              <td>{{ $item->copyrightpage }}</td>
                              <td>{{ $item->privacypolicypage }}</td>
                              <td>{{ $item->termsofusepage }}</td>
                              <td>{{ $item->copyright }}</td>
                              <td>
                                {{-- <a href="{{ url('showfooter',$item->id) }}" class="btn btn-secondary">Show</a> --}}
                                <a href="{{ url('editfooter',$item->id) }}" class="btn btn-primary">
                                  <i class="fas fa-edit"></i>&nbsp;Edit</i>
                                </a>
                                {{-- <a href="{{ url('deletefooter',$item->id) }}" class="btn btn-danger">Delete</a> --}}
                              </td>    
                          </tr>
                          @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
  <br/>
      <!-- /.content -->

@endsection