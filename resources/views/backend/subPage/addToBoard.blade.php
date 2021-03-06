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
              <h1 class="m-0">Manage Accepted Student</h1>
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
                    Assigning to Board Member
                  </h3>

                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                       <a class="btn btn-success float-right btn-sm" href="{{route('student.acceptedStudent')}}"><i class="fa fa-list">
                          Show Accepted Student List</i></a>
                      </li>
                    </ul>
                  </div>

                </div>
                
                <!-- /.card-header -->

                <form action="{{route('student.storeToBoard',$id)}}" method="POST" id="myForm">

                 @csrf
                 
                  <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Board Member No. 1</label>
                        <select class="form-select" name="bM1" aria-label="Default select example">
                              @foreach ($data as $user)
                              <option value="{{$user->email}}" >{{$user->email}}</option>
                              {{-- <input type="hidden" value={{$user->id}} name='bMId1'> --}}
                        @endforeach
                        </select>
                        </div>

                        <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Board Member No. 2</label>
                              <select class="form-select" name="bM2" aria-label="Default select example">
                                    @foreach ($data as $user)
                                    <option value="{{$user->email}}">{{$user->email}}</option>
                                    {{-- <input type="hidden" value={{$user->id}} name='bMId2'> --}}
                                    @endforeach
                              </select>
                        </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Board Member Id No. 1</label>
                                <select class="form-select" name="bMId1" aria-label="Default select example">
                                      @foreach ($data as $user)
                                      <option value="{{$user->id}}">{{$user->name}}'s User id->{{$user->id}}</option>
                                      @endforeach
                                </select>
                               </div> 

                               <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Board Member Id No. 2</label>
                                <select class="form-select" name="bMId2" aria-label="Default select example">
                                      @foreach ($data as $user)
                                      <option value="{{$user->id}}">{{$user->name}}'s User id->{{$user->id}}</option>
                                     @endforeach 
                                </select>
                              </div>  
                      </div>
                  </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Assign</button>
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
                </div>
                <!-- /.card-body -->
              </div>
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