@extends('dashboards.Ourproject.layouts.ourproject-dash-layout')
@section('title','Dashboard')

@section('content')
<!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>OUR PROJECT PAGE</h1>
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
              <a href="{{ route('createourproject') }}" class="btn btn-success mt-2 mb-3 justify-content-between">
                <span>Add New Project</span>
                <i class="fas fa-plus-circle"></i>
              </a>
                      <table id="myDataTable1" class="table table-bordered tbale-hover">
                      <thead>
                      <tr>
                      <th>No</th>
                      <th>Project Name</th>
                      <th>Project Description</th>
                      <th>Project Detail</th>
                      <th>Project Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  @endphp
                        @foreach ($dataProject as $item)
                        <tr>
                            <th scope="item">{{ $no++}}</th>
                            <td>{{ $item->projectname }}</td>
                            <td>{{ $item->projectdescription }}</td>
                            <td>{{ $item->projectdetail }}</td>
                            <td>
                                <img src="{{asset('OurProjectImages/'.$item->projectimage)}}" width="200px" alt="" srcset="">
                            </td>
                            <td>
                              {{-- <a href="{{ url('showproject',$item->id) }}" class="btn btn-secondary">Show</a> --}}
                            <a href="{{ url('editourproject',$item->id) }}" class="btn btn-primary mb-2">
                             <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</i>
                           </a>
                           {{-- <br/>
                           <br/> --}}
                           <a href="{{ url('deleteourproject',$item->id) }}" class="btn btn-danger" data-confirm-delete="true">
                            <i class="fas fa-trash-alt"></i>&nbsp;Delete
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
 