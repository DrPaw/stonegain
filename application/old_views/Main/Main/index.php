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
                                <a href="<?= base_url() ?>User" class="dropdown-toggle">Login</a>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle">Sign Up</a>
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
                                <a href="#" class="dropdown-toggle">Buy</a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle">Sell</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper col-padding-0 col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <!-- Content Header (Page header) -->
                <section class="content-header col-lg-12 col-md-12 col-xs-12 col-sm-12 background-color">
                    <!-- Slideshow container -->
                    <div class="slideshow-container">

                      <!-- Full-width images with number and caption text -->
                      <div class="mySlides fade col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="text font-size-xlarge">STRENGTH IN NUMBERS</div>
                      </div>

                      <div class="mySlides fade"></div>

                      <div class="mySlides fade"></div>

                      <!-- Next and previous buttons -->
                      <a class="prev-front padding-top-95" onclick="plusSlides(-1)">&#10094;</a>
                      <a class="next-front padding-top-95" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <!-- The dots/circles -->
                    <div style="text-align:center; margin-top:125px">
                      <span class="dot" onclick="currentSlide(1)"></span> 
                      <span class="dot" onclick="currentSlide(2)"></span> 
                      <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>
                </section>

                <!-- Main content -->
                <section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0 line-padding-0">
                    <div class="navbar-static-top col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-header">
                        <div class="main-header navbar-custom-menu col-xs-6">
                            <!-- Logo -->
                            <a href="index2.html" class="logo" style="border-right: 0px">
                                <!-- logo for regular state and mobile devices -->
                                <span class="logo-lg"><b>Quick Buy</b></span>
                            </a>
                        </div>
                    </div>
                    <div class="navbar-static-top col-lg-12 col-md-12 col-xs-12 col-sm-12 search-bar col-padding-10">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-50">
                            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">Amount</div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <input type="text" class="form-control input-border" name="Amount" placeholder="Amount">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">Currency</div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <input type="text" class="form-control input-border" name="Currency" placeholder="Currency">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">Country</div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <input type="text" class="form-control input-border" name="Country" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                               <input type="submit" class="btn btn-info pull-center padding-top-10 search-btn" value="Search">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
                    <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12 padding-top-10">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding-top-10">
                            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 sub-padding">
                                <select name="referrer_id" class="form-control">
                                    <option value="0">Advertisement</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 sub-padding">
                                <select name="referrer_id" class="form-control">
                                    <option value="0">Malaysia</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 sub-padding">
                                <select name="referrer_id" class="form-control">
                                    <option value="0">Currency</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 sub-padding">
                                <select name="referrer_id" class="form-control">
                                    <option value="0">Payment Method</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 sub-padding">
                                <input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="Search">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 line-padding-10">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border-gray">
                                <table id="data-table" class="table table-bordered table-hover data-table">
                                    <thead>
                                        <tr class="border-bottom-black">
                                            <th colspan="2">Username</th>
                                            <th>Credit</th>
                                            <th>Payment Method</th>
                                            <th>Limits</th>
                                            <th>Prices</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="font-weight-400">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>hongbin</div>
                                                <div class="quick-seller col-padding-10">quick seller</div>
                                                <div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 429|Rating 98%</div>
                                                <div class="font-color-user">Average Release Time: 6 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
                                            <th class="font-weight-400" style="padding-top:16px">5000-50000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-400">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>tsphkj</div>
                                                <div class="quick-seller col-padding-10">quick seller</div>
                                                <div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 70|Rating 96%</div>
                                                <div class="font-color-user">Average Release Time: 14 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Alipay</th>
                                            <th class="font-weight-400" style="padding-top:16px">500-5000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-400">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>jaingpinmiao</div>
                                                <div></div>
                                                <div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 8|Rating 80%</div>
                                                <div class="font-color-user">Average Release Time: 10 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
                                            <th class="font-weight-400" style="padding-top:16px">3000-20000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>htldyp</div>
                                                <div class="quick-seller col-padding-10">quick seller</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 2179|Rating 98%</div>
                                                <div class="font-color-user">Average Release Time: 10 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
                                            <th class="font-weight-400" style="padding-top:16px">30000-100000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
                </section>
                <!-- /.content -->
                
        </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0">
                    <img src="<?= site_url(); ?>/images/stonegain/stonegain.png" class="col-xs-12 col-padding-0" height="350">
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding15">
                    <strong>&copy; 2016-2018 CoinCola All Rights Reserved.</strong>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding15">
                    <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6"></div>
                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                        <div class="border-bottom">INTRODUCTION</div>
                        <div>About Us</div>
                        <div>Careers</div>
                        <div>Escrowed Trade</div>
                        <div>Press</div>
                        <div>Team</div>
                        <div>Legal & Policy</div>
                        <div>Become Our Partner</div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                        <div class="border-bottom">SOCIAL</div>
                        <div><i class=""></i>Facebook</div>
                        <div><i class=""></i>Twitter</div>
                        <div><i class=""></i>Reddit</div>
                        <div><i class=""></i>LinkedIn</div>
                        <div><i class=""></i>Youtube</div>
                        <div><i class=""></i>Weibo</div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?= base_url() ?>js/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?= base_url() ?>js/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url() ?>js/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="<?= base_url() ?>js/bower_components/raphael/raphael.min.js"></script>
        <script src="<?= base_url() ?>js/bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="<?= base_url() ?>js/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?= base_url() ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?= base_url() ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?= base_url() ?>js/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?= base_url() ?>js/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= base_url() ?>js/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="<?= base_url() ?>js/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?= base_url() ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?= base_url() ?>js/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>js/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?= base_url() ?>js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url() ?>js/demo.js"></script>
        <!-- IonIcon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.0.0-7/collection/icon/icon.js"></script>
    </body>
</html>
        
            