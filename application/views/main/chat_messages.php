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
							<?php
							if($row["is_image"] == 1){
								?>
								<img class="message-image" src="<?= base_url() . $row["message"]?>">
								<?php
							} else {
								?>
								<p class="line-wrap"><?= $row["message"] ?></p>
								<?php
							}
							?>
						</div>
					</div>
					<div class="talktext-details">
						<small>
							<span><?= $row['created_date'] ?></span>
								<?= ($row['has_read'] == 1 and $row['user_id'] == $this->session->userdata('user')['user_id']) ? "<i class='fa fa-check'></i>" : "" ?>
						</small>
					</div>
				</div>
				<?php

		}
		?>
				<script>
					var new_count = <?= $count ?>;

				</script>
