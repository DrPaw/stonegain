<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="title">
		<h1 class="main-title">TRADE MANAGEMENT</h1>
		<h1 class="dummy-title">TRADE MANAGEMENT</h1>
	</div>
</section>

<!-- Main content -->
<section class="content-with-header col-sm-12 hidden-xs hidden-sm no-margin no-padding">
	<div class="col-md-2 col-sm-3 col-xs-4 no-margin no-padding content-with-header">
		<div class="col-sm-12 no-margin no-padding content-with-header">
			<ul class="nav nav-tabs nav-stacked transaction-menu content-with-header">
				<li class="active">
					<a data-toggle="tab" href="#processing" class="flex-center">Processing</a>
				</li>
				<li>
					<a data-toggle="tab" href="#completed" class="flex-center">Completed</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 col-xs-8">
		<div class="tab-content">
			<div id="processing" class="col-xs-12 margin-bottom table-height tab-pane active fade in">
				<table class="table transaction-table">
					<thead>
						<tr style="background-color:#379796;">
							<td style="color:white;">Partner</td>
							<td style="color:white;">Trade ID</td>
							<td style="color:white;">Type</td>
							<td style="color:white;">Amount</td>
							<td style="color:white;">Quantity</td>
							<td style="color:white;">Created</td>
							<td style="color:white;">Trade</td>
							<td style="color:white;">Status</td>
						</tr>
					</thead>
					<tbody style="background-color:white;">
						<?php
					foreach ($user_trades_processing as $row) {
						?>
							<tr>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row['username'] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_listing_id"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row['type'] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["myr_amount"] ?> MYR</td>
								</a>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["btc_amount"] ?> BTC</td>
								</a>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["created_date"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["crypto"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_trade_status"] ?>
									</a>
								</td>
							</tr>
							<?php

					}
					?>
					</tbody>
				</table>
			</div>
			<div id="completed" class="col-xs-12 margin-bottom table-height tab-pane">
				<table class="table transaction-table">
					<thead>
						<tr style="background-color:#379796;">
							<td style="color:white;">Partner</td>
							<td style="color:white;">Trade ID</td>
							<td style="color:white;">Type</td>
							<td style="color:white;">Amount</td>
							<td style="color:white;">Quantity</td>
							<td style="color:white;">Created</td>
							<td style="color:white;">Trade</td>
							<td style="color:white;">Status</td>
						</tr>
					</thead>
					<tbody style="background-color:white;">
						<?php
					foreach ($user_trades_completed as $row) {
						?>
							<tr>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row['username'] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_listing_id"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row['type'] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["myr_amount"] ?> MYR
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["btc_amount"] ?> BTC
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["created_date"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["crypto"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_trade_status"] ?>
									</a>
								</td>
							</tr>
							<?php

					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<section class="hidden-lg hidden-md col-xs-12 col-sm-12 no-margin no-padding">
	<div class="row no-margin no-padding">
		<div class="col-sm-12 no-margin no-padding" style="border-bottom: solid 1px rgba(0,0,0,0.2);">
			<ul class="nav nav-pills">
				<li class="active">
					<a data-toggle="tab" href="#mobile-processing" class="flex-center">Processing</a>
				</li>
				<li>
					<a data-toggle="tab" href="#mobile-completed" class="flex-center">Completed</a>
				</li>
			</ul>
		</div>
		<div class="tab-content col-sm-12" style="overflow-y:scroll;">
			<div id="mobile-processing" class="tab-pane fade in active">
				<table class="table table-striped mobile-table">
					<thead>
						<tr>
							<td>Trade ID</td>
							<td>Amount</td>
							<td>Quantity</td>
							<td>Trade</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php
					foreach ($user_trades_processing as $row) {
						?>
							<tr>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_listing_id"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["myr_amount"] ?> MYR</td>
								</a>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["btc_amount"] ?> BTC</td>
								</a>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["crypto"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_trade_status"] ?>
									</a>
								</td>
							</tr>
							<?php

					}
					?>
					</tbody>
				</table>
			</div>
			<div id="mobile-completed" class="tab-pane fade">
				<table class="table table-striped mobile-table">
					<thead>
					<tr>
							<td>Trade ID</td>
							<td>Amount</td>
							<td>Quantity</td>
							<td>Trade</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php
					foreach ($user_trades_completed as $row) {
						?>
							<tr>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_listing_id"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["myr_amount"] ?> MYR</td>
								</a>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["btc_amount"] ?> BTC</td>
								</a>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["crypto"] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>user_listing/details/<?= $row['user_listing_id'] ?>/<?= $row['user_trade_id'] ?>">
										<?= $row["user_trade_status"] ?>
									</a>
								</td>
							</tr>
							<?php

					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
