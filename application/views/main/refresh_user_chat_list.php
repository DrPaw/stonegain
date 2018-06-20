<?php
foreach ($user_chat_list as $row) {
	?>
	<a>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 chat-user <?php
			if ($open_first == $row['user_chat_id']) {
			?>
				active
			<?php
	}
	?>" data-chat="<?= $row['user_chat_id'] ?>">
			<div class="row user-chat-list-container">
				<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2 d-desktop user-chat-thumbnail-container">
					<img src="<?= base_url() ?>images/profile.jpg" class="user-chat-list-thumbnail">
				</div>
				<div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
					<?php
				if ($row['total_unread'] != 0 AND $open_first != $row["user_chat_id"]) {
					?>
						<span class="badge badge-light individual-chat-badge">
							<?= $row["total_unread"] ?>
						</span>
						<?php

				}
				?>
						<p class="no-padding no-margin chat_username">
							<?= $row["target_username"] ?>
						</p>
						<small class="no-padding no-margin d-desktop">
							<?= $row["last_active_time"] ?>
						</small>
				</div>
			</div>
		</div>
	</a>
	<?php

}
?>
