<?php
foreach ($user_chat_list as $row) {
    ?>
	<a>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 chat-user <?php
		if($open_first){
			?>
			active
			<?php
			$open_first = false;
		}
		?>" data-chat='<?= $row['user_chat_id']?>'>
			<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
				<img src="<?= base_url() ?>images/profile.jpg" class="user-chat-list-thumbnail">
			</div>
			<div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
				<p class="no-padding no-margin">
					<?= $row["target_username"]?>
				</p>
				<small class="no-padding no-margin">
					<?= $row["last_active_time"]?>
				</small>
			</div>
		</div>
	</a>
	<?php

}
?>
