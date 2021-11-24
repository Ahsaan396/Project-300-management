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
              <h1 class="m-0">Password</h1>
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
                    Change Password
                  </h3>

                  {{-- <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                       <a class="btn btn-success float-right btn-sm" href="{{route('supervisorPanel.supervisorList')}}"><i class="fa fa-list">
                          Show Supervisor List</i></a>
                      </li>
                    </ul>
                  </div> --}}

                </div>
                
                <!-- /.card-header -->

                <form action="{{route('supervisorPanel.storePassword')}}" method="POST" id="quickForm">
                      @csrf
                  <div class="card-body">
                    <div class="row">  
                    <div class="form-group col-md-6">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" 
                       id="password" placeholder="Password">
                       
                      <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="cpass" class="form-control"
                        id="cpass" placeholder="Confirm Password">
                        <font style="color: red">{{($errors->has('confirm password'))?($errors->first('confirm password')):''}}</font>
                      </div>
                  </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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

  <script type="text/javascript">
    $(document).ready(function () {
      $('#quickForm').validate({
        rules: {
          password: {
            required: true,
            minlength: 6
          },
          cpass: {
            required: true,
            minlength: 6,
            equalTo : '#password'
          }
        
        },
        messages: {
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          cpass: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

 @endsection