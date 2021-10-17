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
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
           <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  @if(DB::table('users')->where(function($query){
                    $query->where('id', Session('id'))
                    ->where('usertype','Admin');
                  })->count() == 1)

                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Admin Activity
                  </h3>

                  @elseif(DB::table('users')->where(function($query){
                    $query->where('id', Session('id'))
                    ->where('usertype','Supervisor');
                  })->count() == 1)

                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Supervisor Activity
                  </h3>

                  @endif
                </div>

                <div class="card-body">
                  <div class="tab-content p-0">

                @if(DB::table('users')->where(function($query){
                  $query->where('id', Session('id'))
                  ->where('usertype','Admin');
                })->count() == 1)

                @foreach ($pData as $key => $user)

                <h4>Name: {{$user->name}}</h4>
                <h5>Role: {{$user->usertype}}</h5>

                @endforeach

                <h5><a class="text-dark" href="{{route('student.studentList')}}">Total Students: {{$sData}}</a></h5>
                
                <h5><a class="text-dark" href="{{route('supervisorPanel.supervisorList')}}">Total Supervisors: {{$supData}}</a></h5>



                @elseif(DB::table('users')->where(function($query){
                  $query->where('id', Session('id'))
                  ->where('usertype','Supervisor');
                })->count() == 1)

                @foreach ($pData as $key => $user)

                <h4>Name: {{$user->name}}</h4>
                <h5>Role: {{$user->usertype}}</h5>

                @endforeach

                <h5 ><a class="text-dark" href="{{route('student.studentList')}}">Total Students: {{$sData}}</a></h5>

                <h5><a class="text-dark" href="{{route('student.acceptedStudent')}}">Total Accepted Students: {{$aSData}}</a></h5>

                <h5><a class="text-dark" href="{{route('student.allowedForBoard')}}">Total Allowed Students: {{$bSData}}</a></h5>

                <h5><a class="text-dark" href="{{route('student.assignedForReportReview')}}">Total Reports: {{$rSData}}</a></h5>                

              @endif


              </div>
              </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart"
                         style="position: relative; height: 300px;">
                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                     </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                      <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
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

  {{-- <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar --> --}}

</div>
<!-- ./wrapper -->

@endsection

