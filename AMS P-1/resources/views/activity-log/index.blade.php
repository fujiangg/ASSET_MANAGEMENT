              <!-- /.card-header -->
              {{-- <div class="card-body">
                <div class="row mb-4">
                  <div class="col-sm-12">
                      <a href="#" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-plus mr-2"></i>Add New User</a>
                  </div>
                  <table id="myTable3" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Event</th>
                        <th>Subject ID</th>
                        <th>Causer Type</th>
                        <th>Created</th>
                        {{-- <th>Action</th> --}}
                  {{-- </tr>
                  </thead>
                  <tbody>
                    @foreach ($logactivities as $log)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $log->users->name }}</td>             
                        <td>{{ $log->event }}</td>
                        <td>{{ $log->subject_id }}</td>
                        <td>{{ $log->causer_type }}</td>
                        <td>{{ $log->created_at }}</td> --}}
                        {{-- <td>
                            @if ($log->event == 'updated')
                              <a class="btn btn-block btn-outline-dark" href="{{ route('dynamic-table.log-detail',$log->subject_id) }}">Detail</a>
                            @elseif ($log->event == 'deleted')
                              <a class="btn btn-block btn-outline-dark" href="{{ route('dynamic-table.log-detail',$log->subject_id) }}">Detail</a>
                            @else
                              <a class="btn btn-block btn-outline-dark" href="{{ route('dynamic-table.log-detail',$log->subject_id) }}">Detail</a>
                              {{-- {{ $log->description }} --}}
                            {{-- @endif --}}
                      {{-- </td> --}}
                    {{-- </tr>
                    @endforeach
                  </tbody>
                </table> --}}
                {{-- <div class="row text-center">
                    {!! $logactivities->links() !!}
                </div> --}}
              {{-- </div> --}}

@extends('layouts.app')

@section('title', 'ACTIVITY LOGS')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Activity Logs</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card">
              <div class="card-header bg-secondary">
                <h4 class="mb-0">User Activity List</h4>
              </div>
              <div class="card-body">
                <div>
                  <table id="activityLogTable" class="table table-bordered table-hover display">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>User</th>
                          <th>Role</th>
                          <th>Action</th>
                          <th>Target Item (ID)</th>
                          {{-- <th>Causer Type</th> --}}
                          <th>Created</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($logactivities as $log)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $log->users->name }}</td> 
                            <td>{{ $log->users->role->name }}</td>            
                            <td>{{ $log->event }}</td>
                            <td>{{ $log->subject_id }}</td>
                            {{-- <td>{{ $log->causer_type }}</td> --}}
                            <td>{{ $log->created_at }}</td>
                            <td>
                                <a href="{{ route('activity-log.show-detail', $log->id) }}" class="btn btn-primary btn-sm text-white mr-1"><i class="fa-solid fa-eye mr-2"></i>Show Detail</a>
                            </td>
                            {{-- <td>
                                @if ($log->event == 'updated')
                                  <a class="btn btn-block btn-outline-dark" href="{{ route('dynamic-table.log-detail',$log->subject_id) }}">Detail</a>
                                @elseif ($log->event == 'deleted')
                                  <a class="btn btn-block btn-outline-dark" href="{{ route('dynamic-table.log-detail',$log->subject_id) }}">Detail</a>
                                @else
                                  <a class="btn btn-block btn-outline-dark" href="{{ route('dynamic-table.log-detail',$log->subject_id) }}">Detail</a>
                                  {{-- {{ $log->description }} --}}
                                {{-- @endif --}}
                          {{-- </td> --}}
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection