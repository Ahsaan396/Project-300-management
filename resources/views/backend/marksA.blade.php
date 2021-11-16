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
              <h1 class="m-0">Marks of Accepted Students</h1>
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
                    <i class="fas fa-check"></i>
                    Marks
                  </h3>
                </div>
                
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="tab-content p-0">

                    <!-- List -->
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>

                        <tr>
                        <th>SL.</th>  
                        <th>Students ID</th>  
                        <th>Supervisor Marks</th>   
                        <th>Presentation Marks</th>  
                        <th>Reports Marks</th>  
                        <th>Total Marks</th> 
                        <th>Status</th> 
                        <th>Action</th>
                        </tr>

                      </thead>

                      <tbody>
                        @foreach ($data as $key => $user)
                        
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$user->student_id1}} <br> {{$user->student_id2}}</td>
                          <td>{{$user->sM}}</td>
                          <td>{{($user->bM1 + $user->bM2)/2}}</td>
                          <td>{{($user->rM1 + $user->rM2)/2}}</td>
                          {{-- <td>{{(($user->bM1 + $user->bM2)/2)+(($user->rM1 + $user->rM2)/2)+$user->sM}}</td> --}}
                          <td>{{$user->tot_mark}}</td>
                          <td>{{$user->status}}</td>
                          <td>
                            <a title="Remove" class="btn btn-sm btn-danger" 
                            href = "{{route('student.removeM',$user->id)}}"><i class="fa fa-remove"></i></i></a>
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