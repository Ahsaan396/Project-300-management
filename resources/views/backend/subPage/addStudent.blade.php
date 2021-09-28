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
                    Add Student
                  </h3>

                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                       <a class="btn btn-success float-right btn-sm" href="{{route('student.studentList')}}"><i class="fa fa-list">
                          Show Student List</i></a>
                      </li>
                    </ul>
                  </div>

                </div>
                
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="tab-content p-0">

                    <form action="{{route('student.storeStudent')}}" method="POST" id="myForm">
                          {{-- {{ csrf_field() }} --}}
                          @csrf
                        {{-- <div class="card-body"> --}}
                          <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Full Name">
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputPassword1">ID</label>
                            <input type="text" name="student_id" class="form-control" id="exampleInputPassword1" placeholder="ID">
                          </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1">Batch</label>
                              <input type="text" name="batch" class="form-control" id="exampleInputEmail1" placeholder="Batch">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Project Name</label>
                              <input type="text" name="pname" class="form-control" id="exampleInputEmail1" placeholder="Project Name">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Phone Number</label>
                              <input type="number" name="number" class="form-control" id="exampleInputEmail1" placeholder="01620761863" pattern="01620761863">
                            </div>

                        {{-- </div> --}}
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                      </form>

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