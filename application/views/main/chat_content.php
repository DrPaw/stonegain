<div class="relative-wrapper">
	<div class="chat-content-header">
		<div class="col-md-1 col-lg-1 col-sm-4 col-xs-4 align-center">
			<img src="<?= base_url() ?>images/profile.jpg" class="chat-content-thumbnail">
		</div>
		<div class="col-md-11 col-lg-11 col-sm-8 col-xs-8 no-padding">
			<h5 class="chat-content-username">
				<?= $user_chat["target_username"] ?>
			</h5>
		</div>
	</div>
	<div class="chat-content-message-content" id="refresh-messages">
		<?php
	foreach ($messages as $row) {
		?>
			<?php
		if ($row['user_id'] == $this->session->userdata('user')['user_id']) {
			?>
				<div class='sender-bubble-wrapper'>
					<?php

			} else if ($row['user_id'] != $this->session->userdata('user')['user_id']) {
				?>
						<div class='receiver-bubble-wrapper'>
							<?php

					}
					?>
							<div class="talk-bubble tri-right round border right-in">
								<div class="talktext">
									<p class="line-wrap"><?= $row["message"] ?></p>
									<div class="talktext-details">
										<small>
											<?= $row['created_date'] ?>
												<?= ($row['has_read'] == 1 AND $row['user_id'] == $this->session->userdata('user')['user_id']) ? "<i class='fa fa-check'></i>" : "" ?>
										</small>
									</div>
								</div>
							</div>
						</div>
						<?php

				}
				?>
				</div>
				<div class="chat-content-input">
					<div class="relative-wrapper">
						<form method="POST" id="send-message-form">
							<textarea class="form-control message-input" rows="1" name="message" id="form-message"></textarea>
							<input type="hidden" name="user_chat_id" value="<?= $user_chat['user_chat_id'] ?>" id="form-user-chat-id">
							<button type="submit" class="btn btn-default send-button" disabled>
								<i class="fa fa-send"></i>
							</button>
						</form>
					</div>
				</div>
	</div>
