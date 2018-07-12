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
        <link rel="stylesheet" href="<?=base_url()?>css/Main/stonegain.css">
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
                <nav class="navbar navbar-static-top black">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="navbar-custom-menu col-md-4 float-left">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="<?= base_url()?>user_listing/view_listing?currency=BTC" class="font-size-large"><b>BTC</b></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>user_listing/view_listing?currency=ETH" class="font-size-large"><b>ETH</b></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>user_listing/view_listing?currency=LTC" class="font-size-large"><b>LTC</b></a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="navbar-custom-menu col-md-8 float-right">
                                    
                                    <?php
                                if ($this->session->has_userdata("user")) {
                                    ?>
                                    <ul class="nav navbar-nav float-right d-desktop">
                                        <li>
                                            <a href="<?=base_url()?>wallet"><?= $this->session->userdata("balance") ?> BTC</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url()?>trade_management/buy">
                                            <?php if(count($buys_processing)){ ?>
                                            <span class="badge badge-danger"><?= count($buys_processing); ?></span>
                                            <?php } ?>
                                            My Buys</a>
                                        </li>
                                       <li>
                                            <a href="<?= base_url()?>trade_management/sell">My Sells</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>wallet">Wallet</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>transaction">Transactions</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>user/profile"><?= $this->session->userdata("user")["username"]?></a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>access/logout/">Logout</a>
                                        </li>
                                    </ul>
                            <?php
                                } else {
                                    ?>
                                    <ul class="nav navbar-nav float-right d-desktop">
                                        <li>
                                            <a href="<?=base_url()?>Access/login">Login</a>
                                        </li>
                                        <li>
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
                <nav class="navbar sub-header green">
                    <a id="btn_stonegain_nav" class="navbar-toggle collapsed" href="#btn_stonegain_nav" data-toggle="collapse" data-target="#stonegain_nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu float-left">
                        <!-- Logo -->
                        <a href="<?=base_url()?>" class="logo nav_logo">
                            <img  class="logo-image" src="<?= base_url() ?>images/logo.png">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse navbar-custom-menu float-right col-xs-12" id="stonegain_nav">
                        <ul class="nav navbar-nav">
                        <?php
                            if ($this->session->has_userdata("user")) {
                                ?>
                                <li class="d-mobile user_detail_nav">
                                    <a href="#account_nav"data-toggle="collapse" style="font-weight:bold;">User Details</a>
                                </li>
                                <ul id="account_nav" class="nav navbar-nav collapse">
                                    <li>
                                        <a href="<?= base_url()?>trade_management/buy">My Buys</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>trade_management/sell">My Sales</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>wallet">Wallet</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>transaction">Transactions</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>user/profile">Account</a>
                                    </li>
                                </ul>
                            <?php
                            }
                            ?>
                            <?php
                            if($this->session->has_userdata("user")){
                                ?>
                                    <li>
                                        <a href="<?= base_url() ?>user_listing/view_buy_listing">Buy</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>user_listing/view_sell_listing">Sell</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>user_listing/add">Create a new listing</a>
                                    </li>
                                    <li class="d-mobile user_detail_nav">
                                        <a href="<?=base_url()?>access/logout/">Logout</a>
                                    </li>
                                
                            <?php
                            } else {
                            ?>
                                <ul class="nav navbar-nav d-mobile">
                                    <li>
                                        <a href="<?=base_url()?>Access/login">Login</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url()?>Access/register">Sign Up</a>
                                    </li>
                                </ul>
                            <?php
                            }
                            ?>
                        </ul>
                       
                    </div>
                </nav>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper col-padding-0 col-lg-12 col-md-12 col-xs-12 col-sm-12">