<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('asset/css/owl.carousel.min.css')?>"rel="stylesheet">
    <link href="<?php echo base_url('asset/css/tempusdominus-bootstrap-4.min.css')?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('asset/css/style.css')?>" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="ms-3">
                        <span>User</span>
                    </div>
                </div>
                <?php 
                    $class = $this->router->fetch_class() ;
                    $method = $this->router->fetch_method();
                ?>
                <div class="navbar-nav w-100">
                    <a href="<?php echo base_url('index.php/employee/dashboard/dashboard')?>" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-tie me-2"></i>Profile</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?php echo base_url('index.php/employee/employee/useredit')?>" class="nav-link<?= $method == 'Edit' ? 'active': '' ?>"><i class="fa fa-list me-2"></i>User Data</a>
                        <a href="<?php echo base_url('index.php/employee/userpic/userpic')?>" class="nav-link <?= $method == 'ChangeProfilePic' ? 'active': '' ?>"><i class="fas fa-user-alt me-2"></i>Change Pic</a>
                        <a href="<?php echo base_url('index.php/employee/userpass/userpass')?>" class="nav-link<?= $method == 'ChangePassword' ? 'active': '' ?>"><i class="fa fa-key me-2"></i>Change Password</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-tasks fa-lg"></i>Task</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?php echo base_url('index.php/employee/task/task')?>" class="nav-link<?= $method == 'ListTechnology' ? 'active': '' ?>"><i class="far fa-check-circle"></i></i>General tasks</a>
                        <a href="<?php echo base_url('index.php/employee/taskwork/taskwork')?>" class="nav-link<?= $method == 'ListTechnology' ? 'active': '' ?>"><i class="fas fa-pen"></i></i>Task Work</a>    
                    </div>
                    <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-envelope"></i>Application</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?php echo base_url('index.php/employee/employeeleaveapplication/employeeleaveapplication')?>" class="nav-link<?= $method == 'ListTechnology' ? 'active': '' ?>"><i class="fas fa-pencil-alt"></i></i>Leave Application</a>
                        <a href="<?php echo base_url('index.php/employee/employeeleaveapplication/applicationstatus')?>" class="nav-link <?= $method == 'ChangeProfilePic' ? 'active': '' ?>"><i class="fa fa-comments"></i>Status</a>
                        <a href="<?php echo base_url('index.php/employee/employeeleaveapplication/applicationlist')?>" class="nav-link<?= $method == 'ChangePassword' ? 'active': '' ?>"><i class="fa fa-list"></i>Application List</a>
                    </div>
                    <div class="nav-item dropdown">
                    <a href="<?php echo base_url('index.php/employee/login/logout')?>" class="nav-item nav-link"><i class="fas fa-sign-out-alt fa-1x" style="color:red"></i>Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?php echo base_url('index.php/employee/userpic/userpic')?>" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

           