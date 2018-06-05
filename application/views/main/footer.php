</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding15">
		<strong>&copy; 2018 Stonegain All Rights Reserved.</strong>
	</div>
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 padding15">
		<div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
			<div class="border-bottom footer_title"><span>SUPPORTED CURRENCIES</span></div>
			<div>MYR</div>
			<div>USD</div>
			<div>SGD</div>
		</div>
		<div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
			<div class="border-bottom footer_title"><span>INTRODUCTION</span></div>
			<div>About Us</div>
			<div>Careers</div>
			<div>Escrowed Trade</div>
			<div>Press</div>
			<div>Team</div>
			<div>Legal & Policy</div>
			<div>Become Our Partner</div>
		</div>
		<div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
			<div class="border-bottom footer_title"><span>SOCIAL</span></div>
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
<?php
if ($this->session->has_userdata("user")) {
	?>
	<a class="btn btn-primary message-button">
		<div class="message-button-content">
			<i class="fa fa-comments"></i>
			<?php
		if ($this->session->userdata("unread_total") != 0) {
			?>
				<span class="badge badge-light message-button-badge">
					<?= $this->session->userdata("unread_total") ?>
				</span>
				<?php

		}
		?>
		</div>
	</a>
	<?php

}
?>
	<div class="chat-overlay">
	</div>
	<div class="chat-content">
		<div class="relative-wrapper">
			<div class="chat-content-header">
				<div class="col-md-1 col-lg-1 col-sm-4 col-xs-4 align-center">
					<img src="<?= base_url() ?>images/profile.jpg" class="chat-content-thumbnail">
				</div>
				<div class="col-md-11 col-lg-11 col-sm-8 col-xs-8 no-padding">
					<h5 class="chat-content-username">username</h5>
				</div>
			</div>
			<div class="chat-content-message-content">
			</div>
			<div class="chat-content-input">
				<div class="relative-wrapper">
					<textarea class="form-control message-input" id="message-input" rows="1"></textarea>
					<input type="hidden" name="user_chat_id">
					<button type="submit" class="btn btn-default send-button">
						<i class="fa fa-send"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="chat-user-list">
		<a class="btn btn-default close-message-button pull-right">
			<i class="fa fa-close"></i>
		</a>
		<div class="row no-margin" id="refresh-user-list">
			<a>
				<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 chat-user">
					<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
						<img src="<?= base_url() ?>images/profile.jpg" class="user-chat-list-thumbnail">
					</div>
					<div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
						<p class="no-padding no-margin chat_username">user</p>
						<small class="no-padding no-margin d-desktop">
							<?= date("h:i:s a") ?>
						</small>
					</div>
				</div>
			</a>
		</div>
		</a>
	</div>



	<div class="modal" tabindex="-1" role="dialog" id="thankYou">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Thank You For Contacting Us</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>We have received your message. Our team will get back to you as soon as possible.</p>
				</div>

			</div>
		</div>
	</div>
<!-- Modal -->
<div id="upload-modal" class="modal fade" role="dialog">
		<div class="modal-dialog" id="upload-modal-content">
			<form method="POST" id="upload-image-form" enctype="multipart/form-data">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Upload an Image</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
							<div class="alert alert-danger alert-dismissable hidden" id="upload-error">
							</div>
						</div>
						<input type="file" required name="image" id="form-image">
						<input type="hidden" name="user_chat_id" value="" id="form-modal-user-chat-id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
				</div>
			</form>
		</div>
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
		var showing_message_content = 0;
		var total_message_counter_poll_active = true;
		var individual_message_counter_poll_active = false;
		var message_poll_active = false;
		var image_sent = 0;

		(function () {
			var status = $('.status'),
				total_message_counter_poll = function () {

					postParam = {};

					$.post('<?= site_url("Ajax/poll"); ?>', postParam, function (response) {
						$(".message-button").load(location.href + " .message-button-content");
					});
				},

				pollInterval = setInterval(function () { // run function every 1000 ms
					if (total_message_counter_poll_active === true) {
						total_message_counter_poll();
					}
				}, 1000);

			individual_message_counter_poll = function () {

					postParam = {
						user_id: <?= $this->session->userdata('user')['user_id'] ?>
					};

					$.post("<?= site_url('ajax/update_user_chat_list/') ?>", postParam, function (response) {
						$("#refresh-user-list").html(response);
					});
				},

				pollInterval = setInterval(function () { // run function every 1000 ms
					if (individual_message_counter_poll_active === true) {
						individual_message_counter_poll();
					}
				}, 1000);

			message_poll = function () {

					postParam = {
						user_chat_id: showing_message_content,
						user_id: <?= $this->session->userdata('user')['user_id'] ?>
					};

					$.post("<?= site_url('ajax/load_chat_messages/') ?>", postParam, function (response) {
						$("#refresh-messages").html(response);
						var scroll_height = Math.round($('#refresh-messages')[0].scrollHeight);
						var scroll_top = Math.round($('#refresh-messages').scrollTop());
						var outer_height = Math.round($('#refresh-messages').outerHeight());
						// console.log("scroll height " + scroll_height);
						// console.log("scroll top " + scroll_top);
						// console.log("outer height " + outer_height); 
						// console.log("scroll height - scroll top " + (scroll_height - scroll_top)); 
						if (image_sent === 1){
							$('#refresh-messages').animate({ scrollTop: $('#refresh-messages').prop("scrollHeight")}, 1000);
							image_sent = 0;
						}
						if (((scroll_height - scroll_top - 300) < outer_height) && (new_count > chat_count)) {
							$('#refresh-messages').scrollTop($('#refresh-messages')[0].scrollHeight);
							// $('#refresh-messages').animate({ scrollTop: $('#refresh-messages').prop("scrollHeight")}, 1000);
							chat_count = new_count;
						} 
					});
				},

				pollInterval = setInterval(function () { // run function every 1000 ms
					if (message_poll_active === true) {
						message_poll();
					}
				}, 500);
			if (total_message_counter_poll_active === true) {
				total_message_counter_poll(); // also run function on init
			}
			if (individual_message_counter_poll_active === true) {
				individual_message_counter_poll(); // also run function on init
			}
			if (message_poll_active === true) {
				message_poll(); // also run function on init
			}
		})();

		$(document).on('click', ".message-button,.close-message-button", function (e) {
			$(".chat-overlay").toggle();
			if (show_message === false) {
				postParam = {
					user_id: <?= $this->session->userdata('user')['user_id'] ?>
				};

				$.post("<?= site_url('ajax/update_user_chat_list/') ?>", postParam, function (response) {
					$("#refresh-user-list").html(response);

					$(".chat-user-list").animate({
						right: "0"
					}, 500, function () {
						$(".chat-content").toggle();
					});
					show_message = true;
				});
				total_message_counter_poll_active = false;
				individual_message_counter_poll_active = true;
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
						total_message_counter_poll_active = true;
						individual_message_counter_poll_active = false;
						message_poll_active = false;
					});
					show_message_content = false;
				} else {
					$(".chat-content").toggle();
					$(".chat-user-list").animate({
						right: "-20vw"
					}, 500, function () {});
					show_message = false;
					total_message_counter_poll_active = true;
					individual_message_counter_poll_active = false;
					message_poll_active = false;
				}
				$(".chat-user").removeClass("active");
			}
		});

		$(document).on('click', ".chat-user", function (e) {
			var user_chat_id = $(this).data('chat');
			console.log(user_chat_id);
			$('.chat-user').removeClass("active");
			if (show_message_content === false) {
				$(this).addClass("active");
				postParam = {
					user_chat_id: user_chat_id,
					user_id: <?= $this->session->userdata('user')['user_id'] ?>
				};
				$.post("<?= site_url('ajax/load_chat_content/') ?>", postParam, function (response) {
					$(".chat-content").html(response);
					$(".chat-content").animate({
						left: "0"
					}, 500, function () {
						$('#refresh-messages').scrollTop($('#refresh-messages')[0].scrollHeight);
					});
					show_message_content = true;
					message_poll_active = true;
					showing_message_content = user_chat_id;
				});

			} else if (show_message_content === true) {
				if (user_chat_id === showing_message_content) {
					$(this).removeClass("active");
					$(".chat-content").animate({
						left: "80vw"
					}, 500, function () {});
					show_message_content = false;
					message_poll_active = false;
				} else {
					$(this).addClass("active");
					postParam = {
						user_chat_id: user_chat_id,
						user_id: <?= $this->session->userdata('user')['user_id'] ?>
					};
					$.post("<?= site_url('ajax/load_chat_content/') ?>", postParam, function (response) {
						$(".chat-content").html(response);
						$('#refresh-messages').scrollTop($('#refresh-messages')[0].scrollHeight);
						showing_message_content = user_chat_id;
					});
				}
			}
		});

		$(document).on('click', ".chat-with-user", function (e) {
			var target_user_id = $(this).data('user');
			var user_id = <?= $this->session->userdata("user")["user_id"] ?>;

			postParam = {
				target_user_id: target_user_id,
				user_id: user_id
			}

			$.post("<?= site_url('ajax/open_chat/') ?>", postParam, function (response) {
				postParam = {
					target_user_id: target_user_id,
					user_id: user_id,
					user_chat_id: response,
					open_first: true
				};
				$.post("<?= site_url('ajax/update_user_chat_list/') ?>", postParam, function (response) {
					$("#refresh-user-list").html(response);
					$.post("<?= site_url('ajax/load_chat_content/') ?>", postParam, function (response) {
						$(".chat-content").html(response);
						$(".chat-overlay").toggle();
						$(".chat-user-list").animate({
							right: "0"
						}, 500, function () {
							$(".chat-content").toggle();
							$(".chat-content").animate({
								left: "0"
							}, 500, function () {
								$('#refresh-messages').scrollTop($('#refresh-messages')[0].scrollHeight);
							});
							show_message_content = true;
							total_message_counter_poll_active = false;
							individual_message_counter_poll_active = true;
							message_poll_active = true;
						});
						show_message = true;
					});
				});
			});
		});

		$(document).on('submit', '#send-message-form', function (e) {
			e.preventDefault();
			var message = $("#form-message").val();
			var user_chat_id = $("#form-user-chat-id").val();

			postParam = {
				message: message,
				user_chat_id: user_chat_id
			};
			$.post("<?= site_url('ajax/send_message/') ?>", postParam, function (response) {
				$("#refresh-messages").html(response);
				$('#refresh-messages').scrollTop($('#refresh-messages')[0].scrollHeight);
			});

			$("#form-message").val("");
			$(".message-input").keyup();

		});

		$(document).on('keyup', '.message-input', function () {
			this.style.height = 0;
			this.style.height = this.scrollHeight + 'px';

			var message = $(this).val();
			var str_length = $.trim(message).length;

			if (str_length > 0) {
				$('.send-button').prop("disabled", false);
			} else {
				$('.send-button').prop("disabled", true);
			}
		});

		$(document).on('keydown', '#form-message', function (e) {
			// Enter was pressed without shift key
			if (e.keyCode == 13 && !e.shiftKey) {
				// prevent default behavior
				e.preventDefault();
				var message = $("#form-message").val();
				var str_length = $.trim(message).length;
				if (str_length > 0) {
					$("#send-message-form").submit();
				}
			}
		});

		$(document).on("submit", "#upload-image-form", function (e) {
			e.preventDefault();
			var formData = new FormData($(this)[0]);
			$.ajax({
				url: '<?= base_url() ?>ajax/upload_image',
				type: 'POST',
				data: formData,
				dataType: 'json',
				processData: false, // tell jQuery not to process the data
				contentType: false, // tell jQuery not to set contentType
				success: function (response) {
					status = response['status'];
					console.log(status);
					if (status === "true") {
						image_sent = 1;
						$("#upload-modal").modal("hide");
						$("#upload-error").addClass("hidden");
						$("#form-image").val("");
					} else {
						$("#upload-error").removeClass("hidden");
						$("#upload-error").html(response["message"]);
					}
				}
			});
		});

		$(document).on("click", ".upload-button", function(e){
			var user_chat_id = $("#form-user-chat-id").val();
			$("#form-modal-user-chat-id").val(user_chat_id);
			
		});

	</script>
	</body>

	</html>
