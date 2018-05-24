<div class="relative-wrapper">
	<div class="chat-content-header">
		<div class="col-md-1 col-lg-1 col-sm-4 col-xs-4 align-center">
			<img src="<?= base_url() ?>images/profile.jpg" class="chat-content-thumbnail">
		</div>
		<div class="col-md-11 col-lg-11 col-sm-8 col-xs-8 no-padding">
			<h5 class="chat-content-username">
				<?= $user_chat["target_username"]?>
			</h5>
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
