@extends('dashboards.Message.layouts.message-dash-layout')
@section('title','Dashboard')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-HyZ9nLqCjk1/6d0bklOdLJ17gWlW4zUHyI4XcewBXe4X3qJ3fCq7Tp3w9NJi9dP" crossorigin="anonymous">

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>MESSAGE MANAGEMENT</h1>
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
                {{-- <a href="{{ route('createmessage') }}" class="btn btn-success  mt-2 mb-3 ">Tambah <i class="fas fa-plus-square"></i></a> --}}

                {{-- <button class="btn btn-danger" id="multi-delete" data-route="{{ route('posts.multi-delete') }}">Delete All Selected</button> --}}
                      <table id="myDataTable1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        {{-- <th scope="col"><input type="checkbox" class="check-all"></th> --}}
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                  $no = 1;
                  @endphp
                   @foreach ($post as $item)
                   <tr>
                         <th scope="item">{{ $no++}}</th>
                         <td>{{ $item->fullname }}</td>
                         <td>{{ $item->email }}</td>
                         <td>{{ $item->phone }}</td>
                         <td>{{ $item->subject }}</td>
                         <td>{{ $item->message }}</td>
                         <td>
                          @if($item->status==0)
                          <a href="{{ url('change-status/'.$item->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-success">
                            <i class="fas fa-envelope-open"></i> Already Read
                          </a>
                      @else
                          <a href="{{ url('change-status/'.$item->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-secondary">
                              <i class="fas fa-envelope"></i> Unread
                          </a>
                      @endif
                        </td>
                        <td>
                          <a href="{{ url('deletemessage',$item->id) }}" class="btn btn-danger" data-confirm-delete="true">
                            <i class="fas fa-trash-alt"></i>Delete
                          </a>
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
  
  <script type="text/javascript">
    $(document).ready(function() {

      $("#posts-table").TableCheckAll();

      $('#multi-delete').on('click', function() {
        var button = $(this);
        var selected = [];
        $('#posts-table .check:checked').each(function() {
          selected.push($(this).val());
        });

        Swal.fire({
          icon: 'warning',
            title: 'Are you sure you want to delete selected record(s)?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.ajax({
              type: 'post',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: button.data('route'),
              data: {
                'selected': selected
              },
              success: function (response, textStatus, xhr) {
                Swal.fire({
                  icon: 'success',
                    title: response,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                  window.location='/posts'
                });
              }
            });
          }
        });
      });

      $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var button = $(this);

        Swal.fire({
          icon: 'warning',
            title: 'Are you sure you want to delete this record?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.ajax({
              type: 'post',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: button.data('route'),
              data: {
                '_method': 'delete'
              },
              success: function (response, textStatus, xhr) {
                Swal.fire({
                  icon: 'success',
                    title: response,
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                  window.location='/posts'
                });
              }
            });
          }
        });
        
      })
    });
  </script>


  {{-- <script>
    $(document).ready(function(){
      $(#'pasien').DataTable( {
        "processing": true'
        "serverside": true'
        "ajax": "pasien_data.php",
        // scrollY : '250px',
        dom: 'Bfrtip',
        button : [
          {
            extend : 'pdf'
            oriented : 'potrait'
            pageSize : 'legal'
            title : 'Data Message'
            download : 'open'
          },
          'csv','excel','print','copy'
        ]
        columnDefs : [
          {
            "searchable" : false,
            "orderable" : false,
            "targets" : 5,
            "render" : function(data, type, row) {
              var btn = "<center><a href=\"edit.php?id="+data+"\data"
                return btn;
            }
          }
        ]
      })
    })
    </script>

  {{-- <script>
    $(function(e){
      $("#chkCheckAll").click(function(){
        $(".checkBoxClass").prop('checked',$(this).prop('checked'));
      });

    ${{ "#deleteAllSelectedRecord" }}.click(function(e){
      e.preventDefault();
      var allids = [];

      $("input:checkbox[name=ids]:checked").each(function(){
        allids.push($(this).val());
      });

      $.ajax({
        url:"{{ route('selectedUsers') }}",
        type:"DELETE",
        data:{
          _token:$("input[name=_token]").val(),
          ids:allids
        },
        success:function(response){
          $.each(allids,function(key,val){
            $("#sid"+val).remove();
          })
        }
      })
    })
  });
  </script> --}}


    <!-- /.content --> 

@endsection