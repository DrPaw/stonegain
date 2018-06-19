<section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0 line-padding-0">
	<div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
	<div class="col-lg-10 col-md-10 col-xs-12 col-sm-12 padding-top-10">
		<form action="<?= base_url() ?>user_listing/quick_transaction" method="GET">
			<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 padding-top-12">
				<div class="col-lg-4 col-md-5 col-xs-12 col-sm-12 sub-padding">
					<select name="advertisement" class="form-control">
						<option value="">Advertisement</option>
					</select>
				</div>
				<div class="col-lg-4 col-md-5 col-xs-12 col-sm-12 sub-padding">
					<select name="country" class="form-control">
						<option value="">Malaysia</option>
					</select>
				</div>
				<div class="col-lg-4 col-md-5 col-xs-12 col-sm-12 sub-padding">
					<select name="currency" class="form-control">
						<option value="">Currency</option>
						<?php
					foreach ($currency_list as $row) {
						?>
							<option value="<?= $row['currency'] ?>" <?php if ($_GET AND !empty($_GET['currency']) and $_GET['currency']== $row['currency']) { ?>
								selected
								<?php
							}
							?> >
								<?= $row['currency'] ?>
							</option>
							<?php

					}
					?>
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 padding-top-12">
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 sub-padding">
					<input type="submit" class="btn btn-primary pull-center search-btn form-control" value="Search">
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 sub-padding">
					<input type="submit" class="btn btn-primary pull-center search-btn form-control" value="Search">
				</div>
			</div>
		</form>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 line-padding-10">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border-gray">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr class="border-bottom-black">
							<th colspan="2">Username</th>
							<th class="hidden-sm hidden-xs">Credit</th>
							<th class="hidden-sm hidden-xs">Payment Method</th>
							<th class="hidden-sm hidden-xs">Limits</th>
							<th>Prices</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($user_listing as $row) {
							?>
							<tr>
								<th class="font-weight-400">
									<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar listing-avatar">
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<div>
										<a href="<?= base_url()?>user/view_profile/<?= $row['user_id']?>">
											<?= $row["username"] ?>
										</a>
									</div>
								</th>
								<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
									<div>
										<?= $row["trades"]?> Trades|Rating
											<?= $row["rating"]?>%</div>
									<div class="font-color-user">Average Release Time:
										<?= $row["average_time"]?> mins</div>
								</th>
								<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
									<?= $row["payment_method"] ?>
								</th>
								<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
									<?= $row["limit_from"] ?>-
										<?= $row["limit_to"] ?> MYR</th>
								<th class="font-weight-400 price-color" style="padding-top:16px">
									<?= $row["price_after"] ?> MYR/BTC</th>
								<th style="padding-top:16px;text-align:center;">
									<a href="<?= base_url() ?>user_listing/<?= $row["action"] ?>/<?= $row['user_listing_id'] ?>" class="btn btn-primary pull-center line-padding-10 search-btn"><?= strtoupper($row["action"]) ?>
										<?= $row['crypto'] ?>
									</a>
								</th>
							</tr>
							<?php

						}
						?>
					</tbody>
				</table>
			</div>
			<?= $pagination ?>
		</div>
	</div>
	<div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
</section>
