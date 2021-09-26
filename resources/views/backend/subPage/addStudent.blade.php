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
                       <a class="btn btn-success float-right btn-sm" href="{{route('supervisorPanel.addStudent')}}"><i class="fa fa-list">
                          Show Student List</i></a>
                      </li>
                    </ul>
                  </div>

                </div>
                
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="tab-content p-0">

                    <!-- List -->
                    {{-- <table id="example1" class="table table-bordered table-striped">
                      <thead>

                        <tr>
                        <th>SL.</th>  
                        <th>Name</th>  
                        <th>Email</th>  
                        <th>Action</th>  
                        </tr>

                      </thead>

                      <tbody>
                        @foreach ($allData as $key => $user)
                        
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                                <a href=""><i class="fa fa-edit"></i></a>
                          </td>
                        </tr>

                        @endforeach

                      </tbody>

                    </table> --}}
                    <form action="" method="POST" id="myForm">
                          {{-- {{ csrf_field() }} --}}
                          @csrf
                        {{-- <div class="card-body"> --}}
                          <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Full Name">
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputPassword1">ID</label>
                            <input type="text" name="id" class="form-control" id="exampleInputPassword1" placeholder="ID">
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
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Phone Number</label>
                              <input type="tel" name="number" class="form-control" id="exampleInputEmail1" placeholder="01620-761863" pattern="01620-761863">
                            </div>

                            {{-- <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div> --}}

                          {{-- <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>

                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                          </div> --}}
                       
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