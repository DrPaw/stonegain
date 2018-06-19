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
					<a href="<?= base_url() ?>user/edit_profile" class="btn btn-primary pull-right">
						<i class="fa fa-pencil"></i> edit profile</a>
				</div>
			</div>
		</div>
		<div class="col-ms-3 col-lg-3 col-xs-12 col-sm-12 no-padding">
			<div class="col-ms-11 col-lg-11 col-xs-12 col-sm-12 personal-details-container">
                <h4>Personal Details</h4>
                <br>
				<table class="formTable smaller">
					<tr>
                        <td>Country</td>
                        <td>: <?= $user["country"]?></td>
					</tr>
					<tr>
                        <td>Bank</td>
                        <td>: <?= $user["bank_name"]?></td>
					</tr>
					<!-- <tr>
                        <td>Bank Account</td>
                        <td>: <?= $user["bank_account_number"]?></td>
					</tr>
					<tr>
                        <td>Bank Account</td>
                        <td>: <?= $user["bank_account_number"]?></td>
					</tr> -->
					<tr>
                        <td>Perferred Online Time</td>
                        <td>: <?= date("H:i:s a", strtotime($user["preferred_time"]))?></td>
					</tr>
					<tr>
                        <td>Perferred Threshold</td>
                        <td>: <?= $user["preferred_threshold"]?></td>
					</tr>
				</table>
				<br/>
				<lable><b>Referral Link</b></label>
                <p class="word-break"><?= $user["referral_link"]?></p>
			</div>
		</div>
		<div class="col-ms-9 col-lg-9 col-xs-12 col-sm-12 trading-list-container" style="margin-top:2.5%;">
            <h4>Trade Listing</h4>
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 contain-table">
            <table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr class="border-bottom-black">
							<th>Currency</th>
							<th>Amount</th>
							<th>Price</th>
							<th class="hidden-sm hidden-xs">Limits</th>
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
								<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
									<?= $row["limit_from"] ?>-
										<?= $row["limit_to"] ?> MYR</th>
								<th style="padding-top:16px; text-align:center;">
									<a href="<?= base_url() ?>user_listing/<?= $row['action'] ?>/<?= $row['user_listing_id'] ?>" class="btn btn-info pull-center line-padding-10 search-btn">VIEW</a>
								</th>
							</tr>
							<?php

					}
					?>
					</tbody>
                </table>
                <?= $pagination?>
            </div>
		</div>
	</div>
	<div class="col-md-2 col-lg-2 hidden-sm hidden-xs">
	</div>
</section>
