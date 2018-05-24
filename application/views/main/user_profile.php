<section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<br>
	<div class="col-md-2 col-lg-2 hidden-sm hidden-xs">
	</div>
	<div class="col-md-8 col-lg-8 col-md-12 col-xs-12 no-padding">
		<div class="col-ms-12 col-lg-12 col-xs-12 col-sm-12 profile-header">
			<div class="col-md-2 col-lg-2 col-xs-12 col-sm-12 profile-image-container">
				<img class="profile-image" src="<?= base_url() ?>images/profile.jpg">
			</div>
			<div class="col-md-10 col-lg-10 col-xs-12 col-sm-12 profile-details-container no-padding">
				<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-top:1.5vw; height:100%;">
					<h4>
						<?= $user['username'] ?>
							<?php
						if (!empty($user_trust)) {
							?>
							<small class='trusted'>
								<i class='fa fa-check-circle'></i>
							</small>
							<?php

					}
					?>
					</h4>
					<h5>
						<?= $user['email'] ?>
					</h5>
					<br>
					<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 no-padding align-center" style="margin-left:-2vw;">
						<div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
							<p class="no-padding no-margin"><?= $user["trades"]?></p>
							<p class="no-padding no-margin">Trades</p>
						</div>
						<div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
							<p class="no-padding no-margin"><?= $user["trusted"]?></p>
							<p class="no-padding no-margin">Trusted</p>
						</div>
						<div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
							<p class="no-padding no-margin"><?= $user["rating"]?>%</p>
							<p class="no-padding no-margin">Rating</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-top:1.5vw; height:100%;">
					<?php
				if ($this->session->has_userdata("user")) {
					?>
						<?php
					if ($this->session->userdata("user")["user_id"] != $user['user_id']) {
						?>
							<a class="btn btn-primary pull-right chat-with-user" data-user="<?= $user['user_id'] ?>">
								<i class="fa fa-comment"></i> chat
							</a>
							<?php

					}
					if (empty($user_trust)) {
						?>
								<a href="<?= base_url() ?>user/trust/<?= $user['user_id'] ?>" class="btn btn-primary pull-right" style="margin-right:0.5vw;">
									<i class="fa fa-thumbs-up"></i> trust
								</a>
								<?php

						} else {
							?>
									<a href="<?= base_url() ?>user/untrust/<?= $user['user_id'] ?>" class="btn btn-danger pull-right" style="margin-right:0.5vw;">
										<i class="fa fa-thumbs-down"></i> untrust
									</a>
									<?php

							}
							?>

									<?php

							}
							?>
				</div>
			</div>
		</div>
		<div class="col-ms-12 col-lg-12 col-xs-12 col-sm-12 trading-list-container">
			<h4>Trade Listing</h4>
			<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr class="border-bottom-black">
							<th>Currency</th>
							<th>Amount</th>
							<th>Price</th>
							<th>Limits</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
					foreach ($user_listing as $row) {
						?>
							<tr>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["crypto"] ?>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["amount"] ?>
								</th>
								<th class="font-weight-400 price-color" style="padding-top:16px">
									<?= $row["price_after"] ?> MYR/BTC</th>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["limit_from"] ?>-
										<?= $row["limit_to"] ?> MYR</th>
								<th style="padding-top:16px; text-align:center;">
									<a href="<?= base_url() ?>user_listing/buy/<?= $row['user_listing_id'] ?>" class="btn btn-info pull-center line-padding-10 search-btn">BUY
										<?= $row['crypto'] ?>
									</a>
								</th>
							</tr>
							<?php

					}
					?>
					</tbody>
				</table>
				<?= $pagination ?>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-lg-2 hidden-sm hidden-xs">
	</div>
</section>
