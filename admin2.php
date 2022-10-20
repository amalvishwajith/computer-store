<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["ADMINloggedin"]) || $_SESSION["ADMINloggedin"] !== true){
    header("location: database/admin_login.php");
    exit;
}


require_once "database/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" >
    <link rel="stylesheet" href="style/admin.css" >

    <title>Horizon Computers</title>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="style/owl.carousel.min.js"></script>
    <script src="style/anime.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Horizon Computers</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link dropdown-toggle" onclick="changetab('list-home')">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <script>
                function changetab(btn){
                    document.getElementById("list-home").className      = "tab-pane fade";
                    document.getElementById("list-statics").className   = "tab-pane fade";
                    document.getElementById("list-add").className       = "tab-pane fade";
                    document.getElementById("list-update").className    = "tab-pane fade";
                    document.getElementById("list-orders").className    = "tab-pane fade";
                    document.getElementById("list-customer").className  = "tab-pane fade";
                    document.getElementById("list-messages").className  = "tab-pane fade";
                    document.getElementById("list-settings").className  = "tab-pane fade";

                    document.getElementById(btn).className              = "tab-pane fade active show animate__animated animate__fadeIn";
                }
            </script>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item " onclick="changetab('list-statics'),drowchart()">Statics</a>
                        <a class="collapse-item " onclick="changetab('list-add')" >Add Products</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" >Colors</a>
                        <a class="collapse-item" >Borders</a>
                        <a class="collapse-item" >Animations</a>
                        <a class="collapse-item" >Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            1
                            <h4>Welcome Admin</h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <a href="database/admin_logout.php">logout</a>
                        </div>
                        <div class="tab-pane fade" id="list-statics" role="tabpanel" aria-labelledby="list-statics-list">
                <!-- Page Heading================================================================================================22222222222222=========================================== -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Statics</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                            </div>

                            <!-- Content Row -->
                            <div class="row">

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Earnings (Last 30 days)</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rs 
                                                        <?php 
                                                            $sql="SELECT SUM(Quantity) FROM products WHERE Category = 'casing' ";
                                                            $result=mysqli_query($link, $sql);
                                                            echo mysqli_error($link);
                                                            $piedata="";
                                                            $row = mysqli_fetch_assoc($result);
                                                            echo $row['SUM(Quantity)'];
                                                        ?> 
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Earnings (Annual)</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                                    </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-baraa" style="background-color: blue;width:50%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Pending Requests</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Row -->

                            <div class="row">

                                <!-- Area Chart -->
                                <div class="col-xl-8 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                    aria-labelledby="dropdownMenuLink">
                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="max-width: 500px;">
                                        <div>
                                            <canvas id="pie-chartaaaaaaa"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart -->
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                        </div>
                                        <canvas id="pie-chart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Row -->
                            <div class="row">

                                <!-- Content Column -->
                                <div class="col-lg-6 mb-4">

                                    <!-- Project Card Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="small font-weight-bold">Server Migration <span
                                                    class="float-right">20%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Sales Tracking <span
                                                    class="float-right">40%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Customer Database <span
                                                    class="float-right">60%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Payout Details <span
                                                    class="float-right">80%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Account Setup <span
                                                    class="float-right">Complete!</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Color System -->
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-primary text-white shadow">
                                                <div class="card-body">
                                                    Primary
                                                    <div class="text-white-50 small">#4e73df</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-success text-white shadow">
                                                <div class="card-body">
                                                    Success
                                                    <div class="text-white-50 small">#1cc88a</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-info text-white shadow">
                                                <div class="card-body">
                                                    Info
                                                    <div class="text-white-50 small">#36b9cc</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-warning text-white shadow">
                                                <div class="card-body">
                                                    Warning
                                                    <div class="text-white-50 small">#f6c23e</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-danger text-white shadow">
                                                <div class="card-body">
                                                    Danger
                                                    <div class="text-white-50 small">#e74a3b</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-secondary text-white shadow">
                                                <div class="card-body">
                                                    Secondary
                                                    <div class="text-white-50 small">#858796</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-light text-black shadow">
                                                <div class="card-body">
                                                    Light
                                                    <div class="text-black-50 small">#f8f9fc</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card bg-dark text-white shadow">
                                                <div class="card-body">
                                                    Dark
                                                    <div class="text-white-50 small">#5a5c69</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6 mb-4">

                                    <!-- Illustrations -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                                    src="img/undraw_posting_photo.svg" alt="...">
                                            </div>
                                            <p>Add some quality, svg illustrations to your project courtesy of <a
                                                    target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                                constantly updated collection of beautiful svg images that you can use
                                                completely free and without attribution!</p>
                                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                                unDraw &rarr;</a>
                                        </div>
                                    </div>

                                    <!-- Approach -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                        </div>
                                        <div class="card-body">
                                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                                custom components and custom utility classes.</p>
                                            <p class="mb-0">Before working with this theme, you should become familiar with the
                                                Bootstrap framework, especially the utility classes.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            2
                            <h5 >products</h5>
                            <div class="row">
                                <div class="col-4">
    
                                </div>
                                <div class="col-4">
                                        <?php
                                            $piedata="";
                                            $sql=array();
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'casing' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'cooling' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'graphics' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'laptop' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'motherboard' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'monitors' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'power' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'proccessor' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'ram' ");
                                            array_push($sql,"SELECT SUM(Quantity) FROM products WHERE Category = 'storage'");
                                        
                                            foreach ($sql as $value) {
                                                $result=mysqli_query($link, $value);
                                                echo mysqli_error($link);
                                                $row = mysqli_fetch_assoc($result);
                                                $piedata.= $row['SUM(Quantity)'].",";
                                              }
                                        ?>
                                        <script>
                                            var chart1 = new Chart();
                                            function drowchart(){

                                                anime({
                                                    targets: '.progress-baraa',
                                                    delay: 500,
                                                    width: '90%', // -> from '28px' to '100%',
                                                    easing: 'easeInOutExpo',
                                                    direction: 'alternate'
                                                });

                                                setTimeout(function(){ 
                                                    chart1.destroy();
    
                                                    chart1 = new Chart(document.getElementById("pie-chart"), {
                                                        type: 'pie',
                                                        data: {
                                                        labels: ["casing", "cooling", "graphics", "laptop", "motherboard", "monitors", "power", "proccessor", "ram", "storage"],
                                                        datasets: [{
                                                            label: "Population (millions)",
                                                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                                            data: [<?php echo $piedata; ?>]
                                                        }]
                                                        },
                                                        options: {
                                                        title: {
                                                            display: true,
                                                            text: 'Predicted world population (millions) in 2050'
                                                        }
                                                        }
                                                    });
                                                    
                              
    
    
                                                 }, 500);
    
                                            }
    
                                        </script>
                                </div>
                                <div class="col-4"></div>
                            </div>
    
        
                        </div>
                        <div class="tab-pane fade" id="list-add" role="tabpanel" aria-labelledby="list-add-list">
                            3
                            <form id="MB" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Category</label>
                                        <select class="form-control" name="Category" onchange="changeSpec(this);">
                                        <option>Laptop</option>
                                        <option>Desktop</option>
                                        <option>Casing</option>
                                        <option>Cooling</option>
                                        <option>Graphics</option>
                                        <option>MotherBoard</option>
                                        <option>Monitors</option>
                                        <option>PowerSupply</option>
                                        <option>Processor</option>
                                        <option>RAM</option>
                                        <option>Storage</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Price</label>
                                        <input type="number" class="form-control" name="Price">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Brand</label>
                                        <select class="form-control" name="Brand">
                                        <option>ASUS</option>
                                        <option>ACER</option>
                                        <option>SAMSUNG</option>
                                        <option>G-SKILL</option>
                                        <option>ADATA</option>
                                        <option>GIGABYTE</option>
                                        <option>Monitors</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="Name">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label id="spec1a">Processor</label>
                                        <input id="spec1b" type="text" class="form-control" name="Spec1">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label id="spec2a">GPU</label>
                                        <input id="spec2b" type="text" class="form-control" name="Spec2">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label id="spec3a">RAM</label>
                                        <input id="spec3b" type="number" class="form-control" name="Spec3">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label id="spec4a">Size</label>
                                        <input id="spec4b" type="number" class="form-control" name="Spec4">
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="Quantity">
                                </div>
                                <div class="form-group">
                                    <label>About</label>
                                    <textarea class="form-control" rows="5" name="About"></textarea>
                                    <input type="text" name="task" value="AddNew" hidden>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Image</label>
                                        <input type="file" class="form-control-file" name="image" required onchange="readURL(this);">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <img id="preview" src="http://placehold.it/180" alt="your image" style="width: 200px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control-file" value="Add">
                                </div>
                            </form>
                            <script>
                                        const myForm2 = document.getElementById('MB');
    
                                        myForm2.addEventListener('submit', function(e){
                                            e.preventDefault();
    
                                            const formData = new FormData(this);
    
                                            fetch('products.php', {
                                                method:"POST",
                                                body: formData
                                            }).then(function (response) {
                                                return response.text();
                                            })
                                            .then(function (data) {
                                                console.log(data);
                                            })
    
                                            console.log("send");
    
                                        })
                                        /////////////////////////////////////PREVIEW CHANGE///////////////////////////////////////////
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
    
                                                reader.onload = function (e) {
                                                    $('#preview')
                                                        .attr('src', e.target.result);
                                                };
    
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
    
                                        function changeSpec(input) {
                                            var spec1a = document.getElementById('spec1a')
                                            var spec1b = document.getElementById('spec1b')
                                            var spec2a = document.getElementById('spec2a')
                                            var spec2b = document.getElementById('spec2b')
                                            var spec3a = document.getElementById('spec3a')
                                            var spec3b = document.getElementById('spec3b')
                                            var spec4a = document.getElementById('spec4a')
                                            var spec4b = document.getElementById('spec4b')
    
                                            var cat = input.value;
    
                                            switch(cat) {
                                            case 'Laptop':
                                                spec1a.innerHTML = 'Processor';spec2a.innerHTML='GPU';spec3a.innerHTML='RAM';spec4a.innerHTML='Size';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                                break;
                                            case 'Desktop':
                                                spec1a.innerHTML = 'Processor';spec2a.innerHTML='GPU';spec3a.innerHTML='RAM';spec4a.innerHTML='Size';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                                break;
                                            case 'Casing':
                                                spec1a.innerHTML = 'Form Factor';spec2a.innerHTML='';spec3a.innerHTML='';spec4a.innerHTML='';
                                                spec1b.hidden='';spec2b.hidden=true;spec3b.hidden=true;spec4b.hidden=true;
                                                break;
                                            case 'Cooling':
                                                spec1a.innerHTML = 'Socket';spec2a.innerHTML='Liquid/Air';spec3a.innerHTML='Number of Fans';spec4a.innerHTML='';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden=true;
                                                break;
                                            case 'Graphics':
                                                spec1a.innerHTML = 'Chipset';spec2a.innerHTML='PCI Version';spec3a.innerHTML='Size';spec4a.innerHTML='Rated Power Supply';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                                break;
                                            case 'MotherBoard':
                                                spec1a.innerHTML = 'CPU Socket';spec2a.innerHTML='Latest hard disk socket';spec3a.innerHTML='DDR Version';spec4a.innerHTML='PCI Version';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                                break;
                                            case 'Monitors':
                                                spec1a.innerHTML = 'Resolution';spec2a.innerHTML='';spec3a.innerHTML='Hertz';spec4a.innerHTML='Size';
                                                spec1b.hidden='';spec2b.hidden=true;spec3b.hidden='';spec4b.hidden='';
                                                break;
                                            case 'PowerSupply':
                                                spec1a.innerHTML = 'Efficiency';spec2a.innerHTML='Watt';spec3a.innerHTML='';spec4a.innerHTML='';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden=true;spec4b.hidden=true;
                                                break;
                                            case 'Processor':
                                                spec1a.innerHTML = 'Socket';spec2a.innerHTML='';spec3a.innerHTML='Cores';spec4a.innerHTML='';
                                                spec1b.hidden='';spec2b.hidden=true;spec3b.hidden='';spec4b.hidden=true;
                                                break;
                                            case 'RAM':
                                                spec1a.innerHTML = 'DDR Version';spec2a.innerHTML='Package Size';spec3a.innerHTML='Memory';spec4a.innerHTML='Hertz';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                                break;
                                            case 'Storage':
                                                spec1a.innerHTML = 'Des/Lap/Both';spec2a.innerHTML='Socket';spec3a.innerHTML='Capacity';spec4a.innerHTML='';
                                                spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden=true;
                                                break;
                                            default:
                                                // code block
                                            }
                                        }
                                        ////////////////////////////////////////////////////////////////////////////////
    
    
                                    
                                    </script>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="tab-pane fade" id="list-update" role="tabpanel" aria-labelledby="list-update-list">
                                        4
                            <form id="filter" >
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Category</label>
                                            <select class="form-control" id="editcat" name="Category" onchange="filter(this)">
                                            <option value="laptop" >Laptop</option>
                                            <option value="desktop" >Desktop</option>
                                            <option value="casing" >Casing</option>
                                            <option value="cooling" >Cooling</option>
                                            <option value="graphics" >Graphics</option>
                                            <option value="motherboard" >MotherBoard</option>
                                            <option value="monitors" >Monitors</option>
                                            <option value="power" >PowerSupply</option>
                                            <option value="proccessor" >Processor</option>
                                            <option value="ram" >RAM</option>
                                            <option value="storage" >Storage</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Brand</label>
                                            <select class="form-control" name="Brand">
                                            <?php
                                                $sql="SELECT DISTINCT Brand FROM products ORDER BY Brand";
                                                $result = mysqli_query($link, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            
                                            <option><?=$row['Brand']; ?></option>
    
                                            <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>limit</label>
                                            <input type="number" class="form-control" name="limit">
                                            <input type="text" name="task" value="Update" hidden>
                                        </div>
    
                                    </div>
                            </form>
                            <script>
                                function filter(input) {
                                    const formData = new FormData(document.getElementById('filter'));
                                    console.log("amal2");
                                    fetch('products.php', {
                                        method:"POST",
                                        body: formData
                                    }).then(function (response) {
                                        return response.text();
                                    })
                                    .then(function (data) {
                                        document.getElementById("TableBody").innerHTML = data;
                                    })
    
                                    console.log("send");
    
                                }
    
    
                            </script>
                            <br><br><br><br>
    
    
    
    
    
    
    
    
                            <table class="table">
                            <caption>List of users</caption>
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name<h6>Spec1</h6></th>
                                <th scope="col">Brand<h6>Spec2</h6></th>
                                <th scope="col">Availability<h6>Spec3</h6></th>
                                <th scope="col">Quantity<h6>Spec4</h6></th>
                                <th scope="col">Price</th>
                                <th scope="col">About</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody id="TableBody">
                            <?php
                                $sql="SELECT ID,Spec1,Spec2,Spec3,Spec4,Price,Brand,Name,Availability,Quantity,About,Price FROM products  LIMIT 20";
                                $result = mysqli_query($link, $sql);
                                $number=1;
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <th scope="row"><?= $number ?><hr><h6>Specs</h6></th>
                                <form id="<?= $row['ID'] ?>">
                                    <th scope="col"                      >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Name" value="<?= $row['Name'] ?>"         style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec1" value="<?= $row['Spec1'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                    <th style="width: 100px;" scope="col">      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Brand" value="<?= $row['Brand'] ?>"        style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec2" value="<?= $row['Spec2'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                    <th style="width: 50px;" scope="col" >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Availability" value="<?= $row['Availability'] ?>" style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec3" value="<?= $row['Spec3'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                    <th style="width: 50px;" scope="col" >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Quantity" value="<?= $row['Quantity'] ?>"     style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec4" value="<?= $row['Spec4'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                    <th style="width: 50px;" scope="col" >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Price" value="<?= $row['Price'] ?>"        style="pointer-events: none;"></th>
                                    <th scope="col"                      >      <textarea   class="form-control <?= $row['ID'] ?>" rows="4"    name="About"  cols="50"                    style="pointer-events: none;"><?= $row['About'] ?></textarea></th>
                                </form>
                                    <th scope="col"                      >      <button onclick="table('<?= $row['ID'] ?>')">Edit</button></th>
                                    <th scope="col"                      >      <button class="<?= $row['ID'] ?>" onclick="submitForm('<?= $row['ID'] ?>')" style="pointer-events: none;">Update</button></th>
                                </tr>
    
                            <?php $number+=1; }?>
                            </tbody>
                            </table>
                            <script>
                                function table(id) {
                                    var x = document.getElementsByClassName(id);
                                    //console.log(id);
                                    x[0].style.pointerEvents = 'all';
                                    x[1].style.pointerEvents = 'all';
                                    x[2].style.pointerEvents = 'all';
                                    x[3].style.pointerEvents = 'all';
                                    x[4].style.pointerEvents = 'all';
                                    x[5].style.pointerEvents = 'all';
                                    x[6].style.pointerEvents = 'all';
                                    x[7].style.pointerEvents = 'all';
                                    x[8].style.pointerEvents = 'all';
                                    x[9].style.pointerEvents = 'all';
                                    x[10].style.pointerEvents = 'all';
    
                                }
                                function submitForm(id){
    
                                    var y = document.getElementsByClassName(id);
                                    const formData = new FormData();
                                    formData.append("Name"  , y[0].value);
                                    formData.append("Spec1" , y[1].value);
                                    formData.append("Brand" , y[2].value);
                                    formData.append("Spec2" , y[3].value);
                                    formData.append("Availability" , y[4].value);
                                    formData.append("Spec3" , y[5].value);
                                    formData.append("Quantity" , y[6].value);
                                    formData.append("Spec4" , y[7].value);
                                    formData.append("Price" , y[8].value);
                                    formData.append("About" , y[9].value);
                                    formData.append("ID" , id);
                                    
                                    formData.append("task", "ProductUpdate");
    
                                    fetch('products.php', {
                                        method:"POST",
                                        body: formData
                                    }).then(function (response) {
                                        return response.text();
                                    })
                                    .then(function (data) {
                                        console.log(data);
                                        if(data == "updated"){
    
                                        }else{
    
                                        }
                                    })
                                }
                            </script>
                        </div>
    
                        <div class="tab-pane fade overflow-auto" style="height: 1000px;" id="list-orders" role="tabpanel" aria-labelledby="list-orders-list">5
                                <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">ItemName</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">UnitPrice</th>
                                <th scope="col">TotalAmount</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Customer</th>
                                <th scope="col">DeliveryState</th>
                                </tr>
                            </thead>
                            <tbody id="showtable">
    
                            <?php 
                                $sql = "SELECT orders.*, products.Image, products.Name FROM orders INNER JOIN products ON orders.ItemID = products.ID;";
    
                                $sql2 = "SELECT orders.*, custompc.Name, custompc.CPU, custompc.MotherBoard, custompc.GPU, custompc.RAM, custompc.Cooling, custompc.Storage, custompc.Power, custompc.Casing, custompc.Image FROM orders INNER JOIN custompc ON orders.ItemID = custompc.ID;";
    
                                $result = mysqli_query($link, $sql);
                                echo mysqli_error($link);
                                $result2 = mysqli_query($link, $sql2);
                                echo mysqli_error($link);
    
    
                                while($row = mysqli_fetch_assoc($result)){  ?> 
    
                                <tr>
                                <th scope="row"><?=$row['ID']; ?></th>
                                <td><img src="<?=$row['Image']; ?>" alt="" height="50px"></td>
                                <td><?=$row['Name']; ?></td>
                                <td><?=$row['Quantity']; ?></td>
                                <td><?php echo $row['TotalAmount']/$row['Quantity']; ?></td>
                                <td><?=$row['TotalAmount']; ?></td>
                                <td><?=$row['Date']; ?></td>
                                <td onclick="userinformation('<?=$row['CustomerEmail']; ?>')"><?=$row['CustomerEmail']; ?></td>
                                <td><?php if($row['DeliveryState'] == "pending"){echo "<span class='badge badge-warning'>Pending</span>";}else{echo "<span class='badge badge-success'>Delivered</span>";}  ?><button onclick="delivery('<?=$row['ID']; ?>')">Delivered</button></td>
                                </tr>
                                
                                    <?php } 
    
                                    while($row = mysqli_fetch_assoc($result2)){  ?> 
    
                                <tr>
                                <th scope="row"><?=$row['ID']; ?></th>
                                <td><img src="<?=$row['Image']; ?>" alt="" height="50px"></td>
                                <td><?php echo $row['Name'];echo "<br><i>".$row['CPU'];echo "<br>".$row['RAM'];echo "<br>".$row['Cooling'];echo "<br>".$row['Storage'];echo "<br>".$row['Power'];echo "<br>".$row['Casing']."</i>"; ?></td>
                                <td><?=$row['Quantity']; ?></td>
                                <td><?php echo $row['TotalAmount']/$row['Quantity']; ?></td>
                                <td><?=$row['TotalAmount']; ?></td>
                                <td><?=$row['Date']; ?></td>
                                <td onclick="userinformation('<?=$row['CustomerEmail']; ?>')"><?=$row['CustomerEmail']; ?></td>
                                <td><?php if($row['DeliveryState'] == "pending"){echo "<span class='badge badge-warning'>Pending</span>";}else{echo "<span class='badge badge-success'>Delivered</span>";}  ?><button onclick="delivery('<?=$row['ID']; ?>')">Delivered</button></td>
                                </tr>
    
                                    <?php } ?>
    
                            </tbody>
                            <script>
                                    function userinformation(id){
                                        const formDataCustomer = new FormData();
                                        formDataCustomer.append("CustomerEmail", id);
                                        formDataCustomer.append("task", "showcustomer");
    
                                        fetch('database/admin_update.php', {
                                                method:"POST",
                                                body: formDataCustomer
                                            }).then(function (response) {
                                                return response.text();
                                            })
                                            .then(function (data) {
                                                document.getElementById('UserInformation').innerHTML = data;
                                            })
                                    }
                                    function delivery(id){
                                        swal({
                                            title: "Are you sure?",
                                            text: "Once Changed, you will not be able to undo !",
                                            icon: "warning",
                                            dangerMode: true,
                                            buttons: true,
                                            })
                                            .then((willDelete) => {
                                            if (willDelete) {
                                                console.log("a");
                                                const formDatadelivery = new FormData();
                                                formDatadelivery.append("ID", id);
                                                formDatadelivery.append("task", "delivery");
    
                                                fetch('database/admin_update.php', {
                                                        method:"POST",
                                                        body: formDatadelivery
                                                    }).then(function (response) {
                                                        return response.text();
                                                    })
                                                    .then(function (data) {
                                                        swal("Done!", data, "success");
                                                        showtable();
                                                    })
                                            } else {
                                                
                                            }
                                            });
    
                                    }
                                    function showtable(){
                                        const formDatashow = new FormData();
                                        formDatashow.append("task", "tableupdate");
    
                                        fetch('database/admin_update.php', {
                                                method:"POST",
                                                body: formDatashow
                                            }).then(function (response) {
                                                return response.text();
                                            })
                                            .then(function (data) {
                                                document.getElementById('showtable').innerHTML = data;
                                            })
                                    }
                                </script>
                            </table><br><br><br><br><br><br><br><br><br>
                        </div>
                        <div class="tab-pane fade" id="list-customer" role="tabpanel" aria-labelledby="list-customer-list">6
                            
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">8
                        <br><h1>Settings</h1><br>
                            <!-- ======================================================================================================================================================== -->            
                      
                            <!-- ======================================================================================================================================================== -->
                            <h4>Update Password</h4>
    
                            <form id="changePass"> 
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" id="newPass" name="new_password" class="form-control" value="">
                                    <span id="snewPass" class=""></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" id="confirmPass" name="confirm_password" class="form-control">
                                    <span id="sconfirmPass" class=""></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Change">
                                </div>
                            </form>
    
                            <script>
                                        const changePass = document.getElementById('changePass');
    
                                        changePass.addEventListener('submit', function(e){
                                            e.preventDefault();
    
                                            const formData = new FormData(this);
    
                                            fetch('database/admin_reset_password.php', {
                                                method:"POST",
                                                body: formData
                                            }).then(function (response) {
                                                return response.text();
                                            })
                                            .then(function (data) {
                                                const obj = data.split("&&");
                                                document.getElementById("newPass").className = (obj[0] == "" ? 'form-control is-valid' : 'form-control is-invalid');
                                                document.getElementById("snewPass").innerHTML = obj[0];
                                                document.getElementById("confirmPass").className = (obj[1] == "" ? 'form-control is-valid' : 'form-control is-invalid');
                                                document.getElementById("sconfirmPass").innerHTML = obj[1];
                                                if(obj[2]=="done"){
                                                swal("successfully Updated!", "  ", "success");
                                                document.getElementById("newPass").className = 'form-control';
                                                document.getElementById("newPass").value = "";
                                                document.getElementById("confirmPass").className = 'form-control';
                                                document.getElementById("confirmPass").value = "";
                                                }
                                            })
                                        })
                                </script>
    
                            <!-- ======================================================================================================================================================== -->
                                        <h4>Update Name</h4>
    
                                <form id="userUpdate" >
    
                                    <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="FirstName"  required>
                                    </div>
    
                                    <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="LastName"  required>
                                    </div>
    
                                    <input type="text" hidden name="task" value="adminUpdate">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    
                                </form><br><br><br><br><br><br><br>
                                <script>
                                        const myForm3 = document.getElementById('userUpdate');
    
                                        myForm3.addEventListener('submit', function(e){
                                            console.log("ssssss");
                                            e.preventDefault();
    
                                            const formData = new FormData(this);
    
                                            fetch('database/admin_update.php', {
                                                method:"POST",
                                                body: formData
                                            }).then(function (response) {
                                                return response.text();
                                            })
                                            .then(function (data) {
                                                alert(data);
                                            })
                                        })
                                </script>
                        </div>
                      </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Custom scripts for all pages-->
    <script src="style/admin.js"></script>


</body>

</html>