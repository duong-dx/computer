<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Admin</title>

  <!-- Bootstrap core CSS-->
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin.css" rel="stylesheet">
   <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery.js"></script>


   <!-- link css toastr -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Xem trước ảnh  -->
  <!-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> -->
 
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  <!-- hết xem trước ảnh -->

<!-- link css datatables -->
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<!-- end -->
<!-- detail -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/detail.css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- addd employee -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- profile CSS -->
<link rel="stylesheet" type="text/css" href="public/css/profile.css">
<!-- datatable -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- CSS profile customer -->
<link rel="stylesheet" type="text/css" href="public/css/customer_profile.css">

<!-- link css báo cáo thống kê -->
<link rel="stylesheet" type="text/css" href="public/css/statistical.css">
<!-- link css báo cáo thống kê -->
<link rel="stylesheet" type="text/css" href="public/css/statistical2.css">
<!-- link css báo cáo thống kê -->
<link rel="stylesheet" type="text/css" href="public/css/detail_customer.css">






</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html"><i class="fas fa-chess-queen"></i></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="?mod=login&act=logout" id="userDropdown" role="button" >
         Logout
        </a>
        
      </li>
    </ul>

  </nav>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="?mod=employee&act=statistical">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Thống Kê Sơ Bộ</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="?mod=employee&act=profile" >
          <i class="fas fa-user"></i>
          <span>Profile</span> 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?mod=sale&act=create_bill">
          <i class="fas fa-mobile"></i>
          <span>Bán hàng</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="?mod=employee&act=list">
          <i class="far fa-smile-wink"></i>
         
          <span>Quản lý nhân viên</span>
        </a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" href="?mod=customer&act=list" >
          <i class="fas fa-users"></i>
          <span>Quản lý khách hàng</span> 
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-newspaper"></i>
          <span>Quản lý sản phẩm</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="?mod=product&act=list">
            <span>Danh sách sản phẩm</span>
          </a>
          <a class="dropdown-item" href="?mod=category&act=list">Các loại sản phẩm</a>
          <div class="dropdown-divider"></div>
        </div> 
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" href="?mod=sale&act=bill_list" >
         <i class="far fa-address-card"></i>
          <span>Danh sách hóa đơn</span> 
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="?mod=slide&act=list" >
         <i class="far fa-address-card"></i>
          <span>Quản lý Slide</span> 
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="?mod=employee&act=thongke" >
          <i class="fas fa-pen"></i>
          <span>Báo cáo thống kê</span> 
        </a>
      </li>
      
      </ul>
      <div id="content-wrapper">