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
        <link rel="stylesheet" href="<?=base_url()?>css/Main/Main.css">
        <link rel="stylesheet" href="<?=base_url()?>css/Main/style.css">
        <link rel="stylesheet" href="<?=base_url()?>css/Main/main-render.css">
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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="navbar-custom-menu col-md-4 float-left">
                                <ul class="nav navbar-nav">
                                    <li class="messages-menu">
                                        <a href="<?= base_url()?>user_listing/view_listing?currency=BTC" class="font-size-large"><b>BTC</b></a>
                                    </li>
                                    <li class="notifications-menu">
                                        <a href="<?= base_url()?>user_listing/view_listing?currency=ETH" class="font-size-large"><b>ETH</b></a>
                                    </li>
                                    <li class="user user-menu">
                                        <a href="<?= base_url()?>user_listing/view_listing?currency=LTC" class="font-size-large"><b>LTC</b></a>
                                    </li>
                                </ul>
                            </div>
                            
                                <div class="navbar-custom-menu col-md-8 float-right">
                                    
                                    <?php
                                if ($this->session->has_userdata("user")) {
                                    ?>
                                    <ul class="nav navbar-nav float-right">
                                        <!-- <li class="messages-menu">
                                            <a href="#">Balance : 5 BTC</a>
                                        </li> -->
                                        <li class="notifications-menu">
                                            <a href="<?= base_url()?>trade_management/buy">Offers</a>
                                        </li>
                                        <li class="notifications-menu">
                                            <a href="<?= base_url()?>trade_management/sell">Sales</a>
                                        </li>
                                        <li class="tasks-menu">
                                            <a href="<?=base_url()?>wallet">Wallet</a>
                                        </li>
                                        <li class="tasks-menu">
                                            <a href="<?=base_url()?>transaction">Transactions</a>
                                        </li>
                                        <li class="user user-menu">
                                            <a href="<?=base_url()?>user/profile">Account</a>
                                        </li>
                                        <li class="user user-menu">
                                            <a href="<?=base_url()?>access/logout/">Logout</a>
                                        </li>
                                    </ul>
                            <?php
                                } else {
                                    ?>
                                    <ul class="nav navbar-nav float-right">
                                        <li class="messages-menu">
                                            <a href="<?=base_url()?>Access/login">Login</a>
                                        </li>
                                        <li class="notifications-menu">
                                            <a href="<?=base_url()?>Access/register">Sign Up</a>
                                        </li>
                                    </ul>
                                    <?php
                                    }
                                    ?>
                                <div class="dropdown lang_dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><img src="<?= base_url()?>images/lang en.png"></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><img src="<?= base_url()?>images/lang en.png"></a></li>
                                        <li><a href="#"><img src="<?= base_url()?>images/lang cn.png"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <nav class="navbar sub-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#stonegain_nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-custom-menu float-left">
                        <!-- Logo -->
                        <a href="<?=base_url()?>" class="logo">
                            <!-- logo for regular state and mobile devices -->
                            <span class="logo-lg"><b>Stonegain</b></span>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse navbar-custom-menu float-right col-xs-12" id="stonegain_nav">
                        <ul class="nav navbar-nav">
                            <li class="messages-menu">
                                <a href="<?=base_url()?>main/about">AboutUs</a>
                            </li>
                            <li class="notifications-menu">
                                <a href="<?=base_url()?>main/terms">Terms</a>
                            </li>
                            <li class="notifications-menu">
                                <a href="<?=base_url()?>main/privacy">Privacy</a>
                            </li>
                            <!-- <li class="notifications-menu">
                                <a href="<?=base_url()?>main/supported_currency">Supported Currencies</a>
                            </li> -->
                            <li class="notifications-menu">
                                <a href="<?=base_url()?>main/how">How it works</a>
                            </li>
                            <li class="notifications-menu">
                                <a href="<?=base_url()?>main/faq">FAQ</a>
                            </li>
                            <li class="notifications-menu">
                                <a href="<?=base_url()?>main/contact">Contact</a>
                            </li>
                            <?php
                            if($this->session->has_userdata("user")){
                                ?>
                                    <li class="tasks-menu">
                                        <a href="<?= base_url() ?>user_listing/view_listing">Buy</a>
                                    </li>
                                    <li class="user user-menu">
                                        <a href="<?= base_url() ?>user_listing/sell">Sell</a>
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