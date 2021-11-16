<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('Dashboard/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('Dashboard/plugins/summernote/summernote-bs4.min.css') }}">
  <script src="{{ asset('js/chart.js') }}"></script>
  <script src="{{ asset('js/jquery') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>

  <style>
    .floatingButton {
    display: block; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 70px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */ /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: #028ed1; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 25px;
    z-index:99;
}

.floatingButton:hover {
    background-color: #139e48
; /* Add a dark-grey background on hover */
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('Dashboard/img/preloader.gif') }}" alt="logo" height="60" width="60">
  </div>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{ Auth::user()->name }}
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> {{ Auth::user()->getRoleNames()[0] }}
          </a>
          <div class="dropdown-divider"></div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
              </a>
          </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      {{-- <span class="brand-text font-weight-light">logo</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @can('view dashboard')
          <li class="nav-item menu-open">
            <a href="{{ url('/home') }}" class="{{ Request::is('home')? 'nav-link active': 'nav-link' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endcan
          @can('view user')
          <li class="nav-item">
            <a href="#" class="{{ Request::is('users') || Request::is('roles')? 'nav-link active': 'nav-link' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Managements
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('users') }}" class="{{ Request::is('users')? 'nav-link active': 'nav-link' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              @can('view role')
              <li class="nav-item">
                <a href="{{ url('roles') }}" class="{{Request::is('roles')? 'nav-link active': 'nav-link'}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Role</p>
                </a>
              </li>
              @endrole
            </ul>
          </li>
          @endcan
          @can('view notification')
          <li class="nav-item">
            <a href="{{ url('notification') }}" class="{{Request::is('notification')? 'nav-link active': 'nav-link'}}">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                  Notification
              </p>
            </a>
          </li>
          @endcan
          @can('view outing')
          <li class="nav-item">
            <a href="{{ url('outing')}}" class="{{Request::is('outing')? 'nav-link active': 'nav-link'}}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                  Request Outing
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <div class="card">
   @yield('content')
 </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">In-Out Registration</a> | All rights reserved. |</strong>
    
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('Dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('Dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('Dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('Dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('Dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('Dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('Dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('Dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('Dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('Dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Dashboard/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('Dashboard/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('Dashboard/js/pages/dashboard.js') }}"></script>
</body>
</html>
