<?php
session_start();
  if($_SESSION['status_login']!=true) {
    header('location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Lelang Online</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="../assets/images/favicon.png" /> -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"> 
          <!-- <a class="navbar-brand brand-logo" href="#"><img src="../assets/images/logo.svg" alt="logo" /></a> -->
          <!-- <a class="navbar-brand brand-logo-mini" href="#"><img src="../assets/images/logo-mini.svg" alt="logo" /></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <!-- <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Cari barang">
              </div>
            </form>
          </div> -->
          <!-- <ul class="navbar-nav navbar-nav-right">            
            <li class="nav-item nav-language dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-language-icon">
                  <i class="flag-icon flag-icon-id" title="us" id="us"></i>
                </div>
                <div class="nav-language-text">
                  <p class="mb-1 text-white">Indonesia</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="#">
                  <div class="nav-language-icon me-2">
                    <i class="flag-icon flag-icon-ae" title="ae" id="ae"></i>
                  </div>
                  <div class="nav-language-text">
                    <p class="mb-1 text-black">Arabic</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <div class="nav-language-icon me-2">
                    <i class="flag-icon flag-icon-us" title="id" id="id"></i>
                  </div>
                  <div class="nav-language-text">
                    <p class="mb-1 text-black">English</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../assets/images/faces-clipart/pic-1.png" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-white"><?=$_SESSION['nama']?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-end p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="../assets/images/faces-clipart/pic-1.png" alt="">
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase ps-2 text-dark">Pilihan Pengguna</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="profil.php">
                    <span>Profil</span>
                    <i class="mdi mdi-face-profile"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase  ps-2 text-dark mt-2">Tindakan</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="../logout_petugas.php">
                    <span>Log Out</span>
                    <i class="mdi mdi-logout ms-1"></i>
                  </a>
                </div>
              </div>
            </li>
            
            
          </ul> -->
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav pt-5">
            <!-- <li class="nav-item nav-category">Main</li> -->
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <!-- <span class="icon-bg"><i class="mdi mdi-scale-balance menu-icon"></i></span> -->
                <span class="menu-title">Lelang</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="tam_barang.php">
                <!-- <span class="icon-bg"><i class="mdi mdi-package menu-icon"></i></span> -->
                <span class="menu-title">Barang</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="tam_mas.php">
                <!-- <span class="icon-bg"><i class="mdi mdi-human-male-female menu-icon"></i></span> -->
                <span class="menu-title">Masyarakat</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="tam_pet.php">
                <!-- <span class="icon-bg"><i class="mdi mdi-security menu-icon"></i></span> -->
                <span class="menu-title">Petugas</span>
              </a>
            </li>

            <li class="nav-item mb-3">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <!-- <span class="icon-bg"><i class="mdi mdi-plus-circle-outline menu-icon"></i></span> -->
                <span class="menu-title">Lainnya</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="t_barang.php"> Tambah Barang </a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <!-- <img src="../assets/images/faces-clipart/pic-1.png" alt="image"> -->
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1"><?=$_SESSION['nama']?></p>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <!-- <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="profil.php" class="nav-link"><i class="mdi mdi-face-profile menu-icon"></i>
                  <span class="menu-title">Profil</span>
                </a>
              </div>
            </li> -->

            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="../logout_petugas.php" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Log Out</span></a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- isi -->