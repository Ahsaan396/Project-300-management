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
              <h1 class="m-0">Manage Supervisor</h1>
            </div><!-- /.col -->
           <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      {{-- <div class="card-heading pr-4 pl-4" id="session">
                        <div class="Session">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin: 0px">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div> --}}
                
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
                    Register Supervisor
                  </h3>

                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                       <a class="btn btn-success float-right btn-sm" href="{{route('supervisorPanel.supervisorList')}}"><i class="fa fa-list">
                          Show Supervisor List</i></a>
                      </li>
                    </ul>
                  </div>

                </div>
                
                {{-- <!-- /.card-header -->id="myForm" --}}

                <form action="{{route('supervisorPanel.store')}}" method="POST" id="quickForm">
                      @csrf
                  <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Role</label>
                        <select class="form-select" name="usertype" aria-label="Default select example" id="usertype">
                              <option selected>Select Role</option>
                              <option value="Admin">Admin</option>
                              <option value="Supervisor">Supervisor</option>
                        </select>
                        <font style="color: red">{{($errors->has('usertype'))?($errors->first('usertype')):''}}</font>
                        </div>

                        <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Full Name</label>
                              <input type="text" name="name" class="form-control"  id="name" placeholder="Full Name">

                             <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" 
                      id="email" placeholder="Enter email">

                      <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                      
                    </div>

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
                    <button type="submit" class="btn btn-primary">Register</button>
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
          usertype:{
            required: true
          },
          name:{
            required: true
          },
        
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          cpass: {
            required: true,
            minlength: 6,
            equalTo : '#password'
          },
          terms: {
            required: true
          },
        },
        messages: {
          usertype: {
            required: "You have to choose a role"
          },

          name:{
            required: "Please enter a name"
          },

          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          terms: "Please accept our terms"
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