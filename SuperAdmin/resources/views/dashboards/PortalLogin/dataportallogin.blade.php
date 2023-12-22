@extends('dashboards.PortalLogin.layouts.portallogin-dash-layout')
@section('title','Dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>PROJECT MANAGEMENT</h1>
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
              <a href="{{ route('createportallogin') }}" class="btn btn-success mt-2 mb-3 justify-content-between">
                <span>Add Portal Login</span>
                <i class="fas fa-plus-circle"></i>
              </a>
                      <table id="myDataTable1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Project Link</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  @endphp
                        @foreach ($dataPortalLogin as $item)
                        <tr>
                          <th scope="item">{{ $no++}}</th>
                            <td>{{ $item->projectname }}</td>
                            <td>{{ $item->projectlink }}</td>
                            <td>
                              {{-- <a href="{{ url('showpms',$item->id) }}" class="btn btn-secondary">Show</a> --}}
                              <a href="{{ url('editportallogin',$item->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>&nbsp;Edit</i>
                              </a>
                              <a href="{{ url('deleteportallogin',$item->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                <i class="fas fa-trash-alt"></i>&nbsp;Delete</i>
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

@endsection