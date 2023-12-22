@extends('dashboards.ContactUs.layouts.contactus-dash-layout')
@section('title','Dashboard')

@section('content')
       <!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>CONTACT US PAGE</h1>
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
      <div class="container-fluid">
        <div class="">
        <div class=" card card-info card-outline">
            <div class="card-header">
                <div>
                    <h2>Card 1</h2>
                </div>
                {{-- <a href="{{ route('createcontactuscard1') }}" class="btn btn-success  mt-2 mb-3 ">Tambah <i class="fas fa-plus-square"></i></a> --}}
                      <table id="example2" class="table table-bordered tbale-hover">
                      <thead>
                      <tr>
                      <th>No</th>
                      <th>Card Title</th>
                      <th>Card Description</th>
                      <th>Day</th>
                      <th>Time</th>
                      <th>Phone Number</th>
                      <th>Email Address</th>
                      <th>Location Address</th>
                      <th>Facebook Link</th>
                      <th>Twitter Link</th>
                      <th>Instagram Link</th>
                      <th>Linkedin Link</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  @endphp
                        @foreach ($dataContactCard1 as $item)
                        <tr>
                            <th scope="item">{{ $no++}}</th>
                            <td>{{ $item->cardtitle }}</td>
                            <td>{{ $item->carddescription }}</td>
                            <td>{{ $item->day }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->phonenumber }}</td>
                            <td>{{ $item->emailaddress }}</td>
                            <td>{{ $item->locationaddress }}</td>
                            <td>{{ $item->facebooklink }}</td>
                            <td>{{ $item->twitterlink }}</td>
                            <td>{{ $item->instagramlink }}</td>
                            <td>{{ $item->linkedinlink }}</td>
                            <td>
                              <a href="{{ url('editcontactuscard1',$item->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>&nbsp;Edit</i>
                              </a>
                              {{-- <a href="{{ url('deletecontactuscard1',$item->id) }}" class="btn btn-danger">Delete</a> --}}
                            </td>    
                        </tr>
                        @endforeach
                  </tbody>
                </table>
                <br/>
                <br/>
              
                <h2>Card 2</h2>
                {{-- <a href="{{ route('createcontactuscard2') }}" class="btn btn-success  mt-2 mb-3 ">Tambah <i class="fas fa-plus-square"></i></a> --}}
                <table id="" class="table table-bordered tbale-hover">
                <thead>
                <tr>
                <th>No</th>
                <th>Card Title</th>
                <th>Card Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @php
            $no = 1;
            @endphp
                  @foreach ($dataContactCard2 as $item)
                  <tr>
                      <th scope="item">{{ $no++}}</th>
                      <td>{{ $item->cardtitle }}</td>
                      <td>{{ $item->carddescription }}</td>
                      <td>
                        <a href="{{ url('editcontactuscard2',$item->id) }}" class="btn btn-primary">
                          <i class="fas fa-edit"></i>&nbsp;Edit</i>
                        </a>
                        {{-- <a href="{{ url('deletecontactuscard2',$item->id) }}" class="btn btn-danger">Delete</a> --}}
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
 