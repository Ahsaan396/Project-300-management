@extends('frontend.layouts.master')
@section('content')

<div class="wrapper">

   <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Student</h1>
            </div><!-- /.col -->
           <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
    
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    {{-- <i class="fas fa-chart-pie mr-1"></i> --}}
                    <i class="fas fa-user-graduate"></i>
                    Accepted Students
                  </h3>

                  {{-- <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                       <a class="btn btn-success float-right btn-sm" href="{{route('student.addStudent')}}"><i class="fa fa-plus-circle">
                          Add Student</i></a>
                      </li>
                    </ul>
                  </div> --}}

                </div>
                
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="tab-content p-0">

                    <!-- List -->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                        <tr>
                        <th>SL.</th>  
                        <th>Name</th>  
                        <th>ID</th>  
                        <th>Batch</th>  
                        <th>Project Name</th>  
                        <th>Phone Number</th>  
                        <th>Mark</th>
                        
                        </tr>

                      </thead>

                      <tbody>
                        @foreach ($data as $key => $user)
                        
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->student_id}}</td>
                          <td>{{$user->batch}}</td>
                          <td>{{$user->pname}}</td>
                          <td>{{$user->number}}</td>
                          <td>
                            <a title="Mark" class="btn btn-sm btn-primary" href=""><i class="fas fa-sign-out-alt"></i></a>

                            <a title="Delete" class="btn btn-sm btn-danger" href="{{route('student.deleteStudent',$user->id)}}"><i class="fa fa-trash"></i></a>
                          </td>
                        
                        </tr>
                        @endforeach

                      </tbody>

                    </table>


                    <div class="chart tab-pane active" id="revenue-chart"
                         style="position: relative; height: 300px;">
                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                     </div>
                     
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                      <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </section>

                <!-- /.card-header -->
                <div class="card-body pt-0">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
          <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  

 @endsection