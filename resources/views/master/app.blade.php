<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/fa6.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/iconic.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  {{-- Data Table --}}
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
     <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/gfont.css') }}">
  <style>
    thead{
      background: #1c1b29 !important;
      color: #ffffff !important;
    }
    .card-footer {
      text-align: center !important;
      width: 100%;
    padding: .75rem 1.25rem;
    background-color: rgba(0, 0, 0, .03);
    border-top: 0 solid rgba(0, 0, 0, .125);
}
.card-footer > .btn{
  border-radius: 0px;
  margin: 0px 5px
}
aside{
  background: #1c1b29 !important;
}
.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #0a091a !important;
}
[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    background-color: #04031d !important;
    color: #fff;
    font-weight: bold;
}
.alert-success{
  color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
.alert-danger {
    color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #1c1b29;
  box-shadow: 5px 4px 4px 5px rgba(0, 0, 0, 0.1)">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a style="color: #fff" class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>
    {{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> --}}

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" >
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <a class="nav-link" data-toggle="dropdown" href="#" style="color:#fff">
          <i class="fas fa-user"></i>&nbsp;
          @if(Auth::user()->name)
          {{ Auth::user()->name }}
          @else
          No User
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile.edit') }}" class="dropdown-item">
            Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item">
              Signout
          </a>
      </li>


      {{-- <li class="nav-item ">
        <a class="nav-link"  href="{{ route('profile.edit') }}" style="color: #fff">
          {{-- <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" style="width: 35px;margin-top:-5px"> --}}
        {{-- @isset(Auth::user()->name)
        {{ Auth::user()->name }}
         @endisset --}}
          
        {{-- </a> --}}
        
      {{-- </li>
      <li class="nav-item " style="background:#a9a8a8;border-radius:50%">
        <a class="nav-link"  href="{{ url('logout') }}">
          <img src="{{ asset('assets/images/signout.png') }}" alt="Signout" title="Signout" style="width: 35px;margin-top:-5px">
        </a>
        
      </li>  --}}
      
      <li class="nav-item" style="display: none">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Appointment Booking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User Name</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @php
            $first_uri = Request::segment(1);
            if(Auth::user()->role == 'Doctor' || Auth::user()->role == 'Admin'):
            //if(in_array('Setting', $permission)):
              $menu_open_doctor= "";
              $active_menu = '';
              $uris = ['doctor-profile','doctor-document'];
                      if (in_array($first_uri, $uris)) {
                          $menu_open_doctor = "menu-open";
                          $active_menu = 'active';
                      }
            @endphp
          <li class="nav-item has-treeview {{ $menu_open_doctor }}">
            <a href="#" class="nav-link {{ $active_menu }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Doctor Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/doctor-profile/'.Auth::user()->doctor_id) }}" class="nav-link {{ Request::path() == 'doctor-profile/'.Auth::user()->doctor_id ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proflie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/doctor-document') }}" class="nav-link {{ Request::path() == 'doctor-document' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Document</p>
                </a>
              </li>
              
            </ul>
          </li>
         
          @php
          endif;
            //if(in_array('Setting', $permission)):
            if(Auth::user()->role == 'Patient' || Auth::user()->role == 'Admin'):
              $menu_open_patient= "";
              $active_menu_patient = '';
              $uris = ['patient-appointment','patient-document','patient-prescription'];
                      if (in_array($first_uri, $uris)) {
                          $menu_open_patient = "menu-open";
                          $active_menu_patient = 'active';
                      }
            @endphp
          <li class="nav-item has-treeview {{ $menu_open_patient }}">
            <a href="#" class="nav-link {{ $active_menu_patient }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Patient Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/patient-appointment') }}" class="nav-link {{ Request::path() == 'patient-appointment' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appointment Booking</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('/patient-document') }}" class="nav-link {{ Request::path() == 'patient-document' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Document</p>
                </a>
              </li> --}}
              <li class="nav-item">
               
                <a href="{{ url('/patient-prescription') }}" class="nav-link {{ Request::path() == 'patient-prescription' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Last Prescription</p>
                </a>
              </li>
              
            </ul>
          </li>
          @php
          endif;
          //if(in_array('Setting', $permission)):
          if(Auth::user()->role == 'Admin'):
            $menu_open_admin= "";
            $active_menu_admin = '';
            $uris = ['register','user-list','doctor-create','doctor-list','medicine-create','medicine-list','patient-list'];
                    if (in_array($first_uri, $uris)) {
                        $menu_open_admin = "menu-open";
                        $active_menu_admin = 'active';
                    }
          @endphp
          <li class="nav-item has-treeview {{ $menu_open_admin }}">
            <a href="#" class="nav-link {{ $active_menu_admin }}">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Admin Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <a href="{{ url('/register') }}" class="nav-link {{ Request::path() == 'register' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('user-list') }}" class="nav-link {{ Request::path() == 'user-list' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('/booking.list') }}" class="nav-link {{ Request::path() == 'booking.list' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Booking</p>
                </a>
              </li> --}}
              <li class="nav-item">
               
                <a href="{{ url('/patient-list') }}" class="nav-link {{ Request::path() == 'patient-list' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Patient List</p>
                </a>
              </li>
              <li class="nav-item">
               
                <a href="{{ url('/doctor-create') }}" class="nav-link {{ Request::path() == 'doctor-create' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/doctor-list') }}" class="nav-link {{ Request::path() == 'doctor-list' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctor List</p>
                </a>
              </li>
              <li class="nav-item">  
                <a href="{{ url('/medicine-create') }}" class="nav-link {{ Request::path() == 'medicine-create' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/medicine-list') }}" class="nav-link {{ Request::path() == 'medicine-list' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine List</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ url('/mis.report') }}" class="nav-link {{ Request::path() == 'mis.report' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MIS Report</p>
                </a>
              </li> --}}
              
            </ul>
          </li>
          @php
             endif; 
          @endphp

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('breadcrump')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcrump')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


       @yield('content')
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    {{-- <strong>Developed by &copy; <a href="https://ssautomationbd.com/" target="_blank">SS Automation</a>.</strong> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" >
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
  
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
     //Datemask dd/mm/yyyy
    $('.datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    $('[data-mask]').inputmask()
  });
  function delete_check(){
    let check = confirm('Are you sure ?')
    if(check){
      return true;
    }else{
      return false;
    }
  }

  function refresh(){
    $("#refreshed").show();
    $("#checked").hide();
  //  document.getElementById("refreshed").style.display = "block";
   // document.getElementById("checked").style.display = "none";
  }
</script>
<script>
  $(function () {
    //Add text editor
    $('#summernote').summernote()
  })
</script>
<script type="text/javascript">
  // $(function() {
  //   const Toast = Swal.mixin({
  //     toast: true,
  //     position: 'top-end',
  //     showConfirmButton: false,
  //     timer: 3000
  //   });

    

  //   $('.toastrDefaultSuccess').click(function() {
  //     toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  //   });
   
  //   $('.toastrDefaultError').click(function() {
  //     toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  //   });
  // });

</script>
</body>
</html>
