<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($_SESSION['permissions'])) {
	$permissions = get_object_vars($_SESSION['permissions']);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Geo Fighters</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='<?php echo base_url() ?>images/geo_phone.png' type='image/x-icon' />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/brands.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Moment -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'>
    </script>
    <!-- jQuery UI 1.11.4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/jquery-ui/jquery-ui.min.css">
    <script src="<?php echo base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- DateRange Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Chart.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url() ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- DataTables Export CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <!-- pace-progress -->
    <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>plugins/pace-progress/themes/black/pace-theme-minimal.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/pace-progress/themes/black/pace-theme-flat-top.css">

    <!-- DataTables JS -->
    <script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url() ?>plugins/datatables/dataTables.rowReorder.min.js"></script>
    <!-- DataTables Export JS -->
    <script src="<?php echo base_url() ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <!-- ion Slider -->
    <script src="<?php echo base_url() ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap slider -->
    <script src="<?php echo base_url() ?>plugins/bootstrap-slider/bootstrap-slider.min.js"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?php echo base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/toastr/toastr.min.css">
    <script src="<?php echo base_url() ?>plugins/toastr/toastr.min.js"></script>

    <!-- pace-progress -->
    <script src="<?php echo base_url() ?>plugins/pace-progress/pace.min.js"></script>

    <!-- lightbox -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/ekko-lightbox/ekko-lightbox.css">
    <script src="<?php echo base_url() ?>plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

    <!-- uModal -->
    <script src="<?php echo base_url() ?>plugins/umodal/umodal.js"></script>
    <link href="<?php echo base_url() ?>plugins/umodal/umodal.css" rel="stylesheet">

    <!-- hydrokleen css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/hydrokleen.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/fasion-colors.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/bootstrap-slider/css/bootstrap-slider.min.css">
</head>


<body class="hold-transition sidebar-mini pace-primary">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link m-0" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url() ?>dashboard" class="nav-link m-0">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link m-0" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                        <span class="badge badge-warning navbar-badge">
                            <!-- 1 -->
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Hello, <?php echo $this->session->userdata('username');?></span>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url() ?>authentication/logout" class="dropdown-item">Sign Out
                            <span class="float-right text-muted text-sm"><i class="fas fa-sign-out-alt"></i></span>
                        </a>
                    </div>
                </li>
                <!-- <li class="nav-item">
					<a class="nav-link m-0" data-widget="control-sidebar" data-slide="true" href="#">
						<i class="fas fa-th-large"></i>
					</a>
				</li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url() ?>" class="brand-link">
                <img src="<?php echo base_url() ?>images/hk-new-logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-4" style="opacity: .8">
                <span class="brand-text font-weight-light">Geo Fighters </span>BD
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url() ?>images/default-user.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $this->session->userdata('username');?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item" id="navtree_dashboard">
                            <a href="<?php echo base_url() ?>dashboard" class="nav-link m-0" id="navlink_dashboard">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview" id="navtree_authentication">
                            <a href="#" class="nav-link m-0" id="navlink_authentication">
                                <i class="fas fa-users nav-icon"></i>
                                <p> User Management <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>authentication/registration" class="nav-link m-0" id="navlink_registration">
                                        <i class="nav-icon fas fa-address-card"></i><p>Registration</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>user/manage_users" class="nav-link m-0" id="navlink_manage_users">
                                        <i class="nav-icon fas fa-user-edit"></i><p>Manage Users</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>user" class="nav-link m-0" id="navlink_assign_users">
                                        <i class="nav-icon fas fa-gavel"></i><p>Assign Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview" id="navtree_budget_manage">
                            <a href="#" class="nav-link m-0" id="navlink_budget_manage">
                                <i class="fas fa-bus-alt nav-icon"></i>
                                <p> Travel Management <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>travel" class="nav-link m-0" id="navlink_travel_plan">
                                        <i class="nav-icon fas fa-luggage-cart"></i><p>Travel Plan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>travel/accepted_travel_plan" class="nav-link m-0" id="navlink_accepted_travel_plan">
                                        <i class="nav-icon fas fa-calendar-check"></i><p>Accepted Travel Plan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>travel/incomplete_travel_plan" class="nav-link m-0" id="navlink_incomplete_travel_plan">
                                        <i class="nav-icon fas fa-times-circle"></i><p>Incomplete Travel Plan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>travel/budget_claim" class="nav-link m-0" id="navlink_budget_claim">
                                        <i class="nav-icon fas fa-hand-holding-usd"></i><p>Budget Claim Report</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>travel/accepted_budget_claim" class="nav-link m-0" id="navlink_accepted_budget_claim">
                                        <i class="nav-icon fas fa-vote-yea"></i><p>Accpted Budget Claim</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>travel/declined_budget_claim" class="nav-link m-0" id="navlink_declined_budget_claim">
                                        <i class="nav-icon fas fa-not-equal"></i><p>Declined Budget Claim</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview" id="navtree_areas">
                            <a href="#" class="nav-link m-0" id="navlink_areas">
                                <i class="fas fa-map nav-icon"></i>
                                <p> Area management <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>area" class="nav-link m-0" id="navlink_area">
                                        <i class="nav-icon fas fa-globe-americas"></i><p>Area Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>area/manage_regions" class="nav-link m-0" id="navlink_region_management">
                                        <i class="nav-icon fas fa-map-marked-alt"></i><p>Manage Region</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>area/manage_sub_regions" class="nav-link m-0" id="navlink_sub_region_management">
                                        <i class="nav-icon fas fa-sitemap"></i><p>Manage Sub-Region</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>area/manage_routes" class="nav-link m-0" id="navlink_route_management">
                                        <i class="nav-icon fas fa-route"></i><p>Manage Area</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>distributor" class="nav-link m-0" id="navlink_distributor">
                                        <i class="nav-icon fas fa-truck-loading"></i><p>Manage Distributor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview" id="navtree_stock_management">
                            <a href="#" class="nav-link m-0" id="navlink_stock_management">
                                <i class="fas fa-cubes nav-icon"></i>
                                <p> Stock Management <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>phone/manage_phone_stock" class="nav-link m-0" id="navlink_phone_stock">
                                        <i class="nav-icon fas fa-pallet"></i><p>EBS Phone Stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>phone/manage_distributor_phone_stock" class="nav-link m-0" id="navlink_distributor_phone_stock">
                                        <i class="nav-icon fas fa-luggage-cart"></i><p>Distributor Phone Stock</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview mt-1">
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>phone" class="nav-link m-0" id="navlink_phone_model">
                                        <i class="nav-icon fas fa-mobile-alt"></i><p>Manage Phone Model</p>
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

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <?php echo $content ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?php echo date("Y") ?> <a href="http://hydrokleen.com.bd">Geo Phone</a>.</strong>
            All rights reserved.
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    if ($(".content-wrapper").width() <= 1366) {
        $('body').addClass('sidebar-collapse');
    }

    function pleaseWait() {
        Swal.fire({
            title: 'Please Wait...',
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        });
    }

    function somethingWentWrong() {
        Swal.fire({
            title: 'Oops.. Something went wrong!',
            type: 'error',
        }).then((data) => {
            location.reload();
        });
    }

    function accessDenied() {
        Swal.fire({
            title: 'Sorry, You do not have permission.',
            type: 'error',
        }).then((data) => {
            location.reload();
        });
    }

    function sessionExpired() {
        Swal.fire({
            title: 'Session Expired',
            text: 'Please, login again.',
            type: 'warning',
        }).then((data) => {
            window.location.href = "<?php echo base_url() ?>";
        });
    }

    function taskComplete(shouldReload = false) {
        Swal.fire({
            title: 'Successful',
            type: 'success',
        }).then((data) => {
            if (shouldReload) {
                location.reload();
            }
        });
    }

    function taskCompleteTimer(shouldReload = false) {
        Swal.fire({
            title: 'Successful',
            type: 'success',
            showConfirmButton: false,
            timer: 1000
        }).then((data) => {
            if (shouldReload) {
                location.reload();
            }
        });
    }
    </script>
</body>

</html>