
    <body class="hold-transition skin-black sidebar-mini bg">
        <div class="wrapper">
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
                                            <th style="padding-top:16px"><a href="<?= base_url() ?>user" class="btn btn-info pull-center line-padding-10 search-btn">BUY</a></th>
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
                                            <th style="padding-top:16px"><a href="<?= base_url() ?>user" class="btn btn-info pull-center line-padding-10 search-btn">BUY</a></th>
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
                                            <th style="padding-top:16px"><a href="<?= base_url() ?>user" class="btn btn-info pull-center line-padding-10 search-btn">BUY</a></th>
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
                                            <th style="padding-top:16px"><a href="<?= base_url() ?>user" class="btn btn-info pull-center line-padding-10 search-btn">BUY</a></th>
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
        
            