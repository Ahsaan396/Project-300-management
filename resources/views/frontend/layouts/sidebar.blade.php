<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('frontend/dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        @if (auth()->user()->usertype=='Admin')
        <span class="brand-text font-weight-light">Admin Panel</span>
        
        @else
        <span class="brand-text font-weight-light">Supervisor Panel</span>
        
        @endif
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
  
  
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          {{-- <div class="image">
            <img src="{{asset('frontend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div> --}}
  
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>

     
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
           
                @if (auth()->user()->usertype=='Admin')

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    {{-- <i class="nav-icon fas fa-copy"></i> --}}
                    <i class="fas fa-chalkboard-teacher"></i>
                    <p>
                      Supervisor Panel
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('supervisorPanel.supervisorList')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supervisor List</p>
                      </a>
                    </li>
                  </ul>

                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('supervisorPanel.boardMemberList')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Board Member List</p>
                      </a>
                    </li>
                  </ul>
                </li>
                
                @endif
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                <i class="fas fa-user-graduate"></i>
                <p>
                  Student
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
  
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.studentList')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student List</p>
                  </a>
                </li>
              </ul>
  
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.acceptedStudent')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Accepted Student</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.rejectedStudent')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rejected Student</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.allowedForBoard')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Allowed For Board</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.assignedForReportReview')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assigned For Report Review</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('student.marksA')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Marks of Accepted Students</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('viva.allowedForViva')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Allowed For Viva</p>
                  </a>
                </li>
              </ul>
  
            </li>
  
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>