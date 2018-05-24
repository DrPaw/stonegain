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
