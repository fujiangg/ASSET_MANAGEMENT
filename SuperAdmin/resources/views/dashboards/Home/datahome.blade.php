@extends('dashboards.Home.layouts.home-dash-layout')
@section('title','Dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>HOME PAGE</h1>
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
              {{-- <a href="#" class="btn btn-danger" id="deleteAllSelectedRecord">Delete Selected</a> --}}
                {{-- <a href="{{ route('createhome') }}" class="btn btn-success  mt-2 mb-3 ">Tambah <i class="fas fa-plus-square"></i></a> --}}

                {{-- <button class="btn btn-danger" id="multi-delete" data-route="{{ route('posts.multi-delete') }}">Delete All Selected</button> --}}
                      <table id="" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        {{-- <th scope="col"><input type="checkbox" class="check-all"></th> --}}
                        <th>Website Image</th>
                        <th>Website Logo</th>
                        <th>Greetings Word</th>
                        <th>Website Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach ($dataHome as $item)
                          <td>
                          <img src="{{asset('HomeImages/'.$item->websiteimage)}}" width="200px" alt="" srcset="">
                      </td>
                         <td>
                            <img src="{{asset('HomeImages/'.$item->websitelogo)}}" width="200px" alt="" srcset="">
                        </td>
                             <td>{{ $item->greetingsword }}</td>
                             <td>{{ $item->websitedescription }}</td>
                             <td>
                               {{-- <a href="{{ url('showmessage',$item->id) }}" class="btn btn-secondary">Show</a> --}}
                               <a href="{{ url('edithome',$item->id) }}" class="btn btn-primary">
                              <i class="fas fa-edit"></i>Edit
                              </a>
                               {{-- <a href="{{ url('deletehome',$item->id) }}" class="btn btn-danger">Delete</a> --}}
                             </td>    
                         </tr>
                         @endforeach
                  </tbody>
                </table>

        </div>
            {{-- <a href="javascript:void(0)" onclick="editstudent({{$student->id}})"> --}}
        </div>
    </div>
  </div>
  </div>
  <br/>
    <!-- /.content --> 

@endsection