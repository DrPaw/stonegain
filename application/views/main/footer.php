</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding15">
		<strong>&copy; 2016-2018 CoinCola All Rights Reserved.</strong>
	</div>
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding15">
		<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3"></div>
		<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
			<div class="border-bottom">SUPPORTED CURRENCIES</div>
			<div>MYR</div>
			<div>USD</div>
			<div>SGD</div>
		</div>
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
			<div>
				<i class=""></i>Facebook</div>
			<div>
				<i class=""></i>Twitter</div>
			<div>
				<i class=""></i>Reddit</div>
			<div>
				<i class=""></i>LinkedIn</div>
			<div>
				<i class=""></i>Youtube</div>
			<div>
				<i class=""></i>Weibo</div>
		</div>
	</div>
</footer>
</div>
<!-- ./wrapper -->
<a class="btn btn-primary message-button">
	<i class="fa fa-comments"></i>
</a>
<div class="chat-overlay">
</div>
<div class="chat-content">
</div>
<div class="chat-user-list">
	<a class="btn btn-default close-message-button pull-right">
		<i class="fa fa-close"></i>
		<div class="row no-margin">
			<a>
				<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 chat-user">
					<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
					</div>
					<div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
						<p class="no-padding no-margin">user</p>
						<small class="no-padding no-margin">
							<?= date("h:i:s a")?>
						</small>
					</div>
				</div>
			</a>
		</div>
	</a>
</div>
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
<!-- Google map API js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-IIoucJ-70FQg6xZsORjQCUPHCVj9GV4"></script>
<!-- Google map js -->
<script src="<?= site_url(); ?>js/main/google-map.js"></script>
<script src="<?= site_url(); ?>js/main/jquery.fancybox.js"></script>
<script src="<?= site_url(); ?>js/main/functions.js"></script>
<script>
	var show_message = false;
	var show_message_content = false;

	$(document).on('click', ".message-button,.close-message-button", function (e) {
		$(".chat-overlay").toggle();
		if (show_message === false) {
			$(".chat-user-list").animate({
				right: "0"
			}, 500, function () {
				$(".chat-content").toggle();
			});
			show_message = true;
		} else if (show_message === true) {
			if (show_message_content === true) {
				$(".chat-content").animate({
					left: "80vw"
				}, 500, function () {
					$(".chat-content").toggle();
					$(".chat-user-list").animate({
						right: "-20vw"
					}, 500, function () {});
					show_message = false;
				});
				show_message_content = false;
			} else {
				$(".chat-content").toggle();
				$(".chat-user-list").animate({
					right: "-20vw"
				}, 500, function () {});
				show_message = false;
			}

		}
	});

	$(document).on('click', ".chat-user", function (e) {
		if (show_message_content === false) {
			$(".chat-content").animate({
				left: "0"
			}, 500, function () {});
			show_message_content = true;
		} else if (show_message_content === true) {
			$(".chat-content").animate({
				left: "80vw"
			}, 500, function () {});
			show_message_content = false;
		}
	});

</script>
</body>

</html>
