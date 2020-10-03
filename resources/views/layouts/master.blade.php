<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>
  <style>

  .pagination{
    float:right;
    display: inline-block;
   
  }
  .pagination .active{
    background-color: #36b9cc;
    color: white;
    border: 1px solid #36b9cc;
   }

   .pagination li{
    color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  font-size: 15px;
   }

</style>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
  <link href="{{url('assets/dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{url('assets/dashboard/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('customer-list') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Customer</span></a>
      </li>
            <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('customer-location-list') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Customer Location</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('orders-list') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Orders</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('logout') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Logout</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid">
          <div id="content">
            @yield('content')
          </div>
        </div>
      </div>

    </div>
  </div>


  <script src="{{url('assets/dashboard/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('assets/dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('assets/dashboard/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('assets/dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('assets/dashboard/js/demo/datatables-demo.js')}}"></script>

</body>

</html>
