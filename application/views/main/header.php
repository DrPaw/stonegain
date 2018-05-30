<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>STONEGAIN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url()?>css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?=base_url()?>css/Main.css">
        <link rel="stylesheet" href="<?=base_url()?>css/Main/style.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?=base_url()?>css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?=base_url()?>css/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?=base_url()?>css/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?=base_url()?>css/bootstrap-datepicker.min.css">
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>	
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?=base_url()?>css/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?=base_url()?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- jQuery 3 -->
        <script src="<?=base_url()?>js/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?=base_url()?>js/bower_components/jquery-ui/jquery-ui.min.js"></script>

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
                                <a href="<?= base_url()?>user_listing/view_listing?currency=BTC" class="dropdown-toggle font-size-large"><b>BTC</b></a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="<?= base_url()?>user_listing/view_listing?currency=ETH" class="dropdown-toggle font-size-large"><b>ETH</b></a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="<?= base_url()?>user_listing/view_listing?currency=LTC" class="dropdown-toggle font-size-large"><b>LTC</b></a>
                            </li>
                        </ul>
                    </div>
                    <?php
                        if ($this->session->has_userdata("user")) {
                    ?>
                        <div class="navbar-custom-menu col-xs-6">
                            <ul class="nav navbar-nav float-right">
                                <!-- <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle">Balance : 5 BTC</a>
                                </li> -->
                                <li class="dropdown notifications-menu">
                                    <a href="<?= base_url()?>trade_management/buy" class="dropdown-toggle">Offers</a>
                                </li>
                                <li class="dropdown notifications-menu">
                                    <a href="<?= base_url()?>trade_management/sell" class="dropdown-toggle">Sales</a>
                                </li>
                                <li class="dropdown tasks-menu">
                                    <a href="<?=base_url()?>wallet" class="dropdown-toggle">Wallet</a>
                                </li>
                                <li class="dropdown tasks-menu">
                                    <a href="<?=base_url()?>transaction" class="dropdown-toggle">Transactions</a>
                                </li>
                                <li class="dropdown user user-menu">
                                    <a href="<?=base_url()?>user/profile" class="dropdown-toggle">Account</a>
                                </li>
                                <li class="dropdown user user-menu">
                                    <a href="<?=base_url()?>access/logout/" class="dropdown-toggle">Logout</a>
                                </li>
                            </ul>
                        </div>
                    <?php
                        } else {
                    ?>
                        <div class="navbar-custom-menu col-xs-6">
                            <ul class="nav navbar-nav float-right">
                                <li class="dropdown messages-menu">
                                    <a href="<?=base_url()?>Access/login" class="dropdown-toggle">Login</a>
                                </li>
                                <li class="dropdown notifications-menu">
                                    <a href="<?=base_url()?>Access/register" class="dropdown-toggle">Sign Up</a>
                                </li>
                            </ul>
                        </div>
                        <?php
                            }
                        ?>
                </nav>
                <nav class="navbar navbar-static-top sub-header">
                    <div class="navbar-custom-menu col-xs-6">
                        <!-- Logo -->
                        <a href="<?=base_url()?>" class="logo">
                            <!-- logo for regular state and mobile devices -->
                            <span class="logo-lg"><b>Stonegain</b></span>
                        </a>
                    </div>
                    <div class="navbar-custom-menu col-xs-6">
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown messages-menu">
                                <a href="<?=base_url()?>main/about" class="dropdown-toggle">AboutUs</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="<?=base_url()?>main/terms" class="dropdown-toggle">Terms</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="<?=base_url()?>main/privacy" class="dropdown-toggle">Privacy</a>
                            </li>
                            <!-- <li class="dropdown notifications-menu">
                                <a href="<?=base_url()?>main/supported_currency" class="dropdown-toggle">Supported Currencies</a>
                            </li> -->
                            <li class="dropdown notifications-menu">
                                <a href="<?=base_url()?>main/how" class="dropdown-toggle">How it works</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="<?=base_url()?>main/faq" class="dropdown-toggle">FAQ</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="<?=base_url()?>main/contact" class="dropdown-toggle">Contact</a>
                            </li>
                            <?php
                            if($this->session->has_userdata("user")){
                                ?>
                                    <li class="dropdown tasks-menu">
                                        <a href="<?= base_url() ?>user_listing/view_listing" class="dropdown-toggle">Buy</a>
                                    </li>
                                    <li class="dropdown user user-menu">
                                        <a href="<?= base_url() ?>user_listing/sell" class="dropdown-toggle">Sell</a>
                                    </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper col-padding-0 col-lg-12 col-md-12 col-xs-12 col-sm-12">