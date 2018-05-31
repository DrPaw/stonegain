<!DOCTYPE html>
<html>
    <head>
        <title>Stonegains</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>js/notify.min.js"></script>
        <script src="<?= base_url() ?>js/moment.min.js"></script>
        <script src="<?= base_url() ?>js/bootstrapValidator.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
        <link rel="stylesheet" type="text/css" media="print" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.print.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/skins/_all-skins.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>css/Main.css">
        <link rel="stylesheet" href="<?= base_url() ?>css/admin.css">
        <link rel="stylesheet" href="<?= base_url() ?>/js/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?= base_url() ?>/js/plugins/fullcalendar-3.4.0/fullcalendar.min.css">
        <link rel="stylesheet" media="print" href="<?= base_url() ?>/js/plugins/fullcalendar-3.4.0/fullcalendar.print.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/admin.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/bootstrapValidator.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery-ui.structure.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery-ui.theme.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery.loadingModal.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery.loadingModal.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/jquery.jOrgChart.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <link rel="stylesheet" href="<?php echo site_url(); ?>/css/datepicker3.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
    </head>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a class="logo">
                    <span class="logo-mini"><b>A</b>LTE</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <ul class="nav navbar-nav pull-right">
                    </ul>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="<?= base_url() ?>admin">
                                <i class="fa fa-coffee"></i> <span>Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin_user/">
                                <i class="fa fa-user"></i> <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin_transaction">
                                <i class="fa fa-file"></i> <span>Transaction</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin_user_chat">
                                <i class="fa fa-comments"></i> <span>User Chats</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin_user_chat/search">
                                <i class="fa fa-commenting"></i> <span>User Message Search</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>access/logout">
                                <i class="fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper margin-left-230 backgroundcolor-admin
            <?php
            if (isset($calendar_height)) {
                ?>
                     calendar-height
                     <?php
                 }
                 ?>">