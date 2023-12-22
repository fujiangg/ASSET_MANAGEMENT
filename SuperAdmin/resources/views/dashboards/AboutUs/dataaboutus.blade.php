@extends('dashboards.AboutUs.layouts.aboutus-dash-layout')
@section('title','Dashboard')

@section('content')
       <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>ABOUT US PAGE</h1>
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
                {{-- <a href="{{ route('createaboutusdescription') }}" class="btn btn-success  mt-2 mb-3 ">Tambah <i class="fas fa-plus-square"></i></a> --}}
                <table id="" class="table table-bordered tbale-hover">
                <thead>
                <tr>
                <th>About Us Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                  @foreach ($dataAboutDescription as $item)
                  <tr>
                      <td>{{ $item->description }}</td>
                      <td>
                        {{-- <a href="{{ url('showproject',$item->id) }}" class="btn btn-secondary">Show</a> --}}
                        <a href="{{ url('editaboutusdescription',$item->id) }}" class="btn btn-primary">
                          <i class="fas fa-edit"></i>&nbsp;Edit</i>
                        </a>
                        {{-- <a href="{{ url('deleteaboutusdescription',$item->id) }}" class="btn btn-danger">Delete</a> --}}
                      </td>    
                  </tr>
                  @endforeach
            </tbody>
          </table>

          <a href="{{ route('createaboutusteam') }}" class="btn btn-success mt-2 mb-3 justify-content-between">
            <span>Add New Member</span>
            <i class="fas fa-plus-circle"></i>
          </a>
                      <table id="myDataTable1" class="table table-bordered tbale-hover">
                      <thead>
                      <tr>
                      <th>No</th>
                      <th>Full Name</th>
                      <th>Job Position</th>
                      <th>Instagram Link</th>
                      <th>Linkedin Link</th>
                      <th>Profile Picture</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  @endphp
                         @foreach ($dataAboutTeam as $item)
                        <tr>
                            <th scope="item">{{ $no++}}</th>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->jobposition }}</td>
                            <td>{{ $item->instagramlink }}</td>
                            <td>{{ $item->linkedinlink }}</td>
                            <td>
                                <img src="{{asset('AboutUsImages/'.$item->profilepicture)}}" width="60px" alt="" srcset="">
                            </td>
                            <td>
                               {{-- <a href="{{ url('showproject',$item->id) }}" class="btn btn-secondary">Show</a> --}}
                             <a href="{{ url('editaboutusteam',$item->id) }}" class="btn btn-primary mb-2">
                              <i class="fas fa-edit"></i>&nbsp;Edit</i>
                            </a>
                            {{-- <br/>
                            <br/> --}}
                            <a href="{{ url('deleteaboutusteam',$item->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                <i class="fas fa-trash-alt"></i>Delete</i>
                              </a>
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
@include('sweetalert::alert')
@endsection


 