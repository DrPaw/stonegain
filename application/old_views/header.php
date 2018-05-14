<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>STONEGAIN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>css/Main.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url() ?>css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?= base_url() ?>css/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?= base_url() ?>css/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?= base_url() ?>css/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?= base_url() ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-black sidebar-mini bg">
        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="navbar-custom-menu col-xs-6">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle font-size-large"><b>BTC</b></a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle font-size-large"><b>ETH</b></a>
                            </li>
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle font-size-large"><b>BCH</b></a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle font-size-large"><b>LTC</b></a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-custom-menu col-xs-6">
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle">Balance : 5 BTC</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle">Order</a>
                            </li>
                            <li class="dropdown tasks-menu">
                                <a href="<?= base_url() ?>wallet" class="dropdown-toggle">Wallet</a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="<?= base_url() ?>userList/current_user/" class="dropdown-toggle">Account</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <nav class="navbar navbar-static-top sub-header">
                    <div class="navbar-custom-menu col-xs-6">
                        <!-- Logo -->
                        <a href="index2.html" class="logo">
                            <!-- logo for regular state and mobile devices -->
                            <span class="logo-lg"><b>Stonegain</b></span>
                        </a>
                    </div>
                    <div class="navbar-custom-menu col-xs-6">
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle">AboutUs</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle">Terms</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle">FAQ</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle">Contact</a>
                            </li>
                            <li class="dropdown tasks-menu">
                                <a href="<?= base_url() ?>trademanagement" class="dropdown-toggle">Buy</a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="<?= base_url() ?>trademanagement" class="dropdown-toggle">Sell</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper col-padding-0 col-lg-12 col-md-12 col-xs-12 col-sm-12">