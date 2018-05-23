<!-- Content Header (Page header) -->
<section class="content-header col-lg-12 col-md-12 col-xs-12 col-sm-12 background-color">
	<div id="slideshow">
		<div class="slide-wrapper">
			<div class="slide">
				<h3 class="slide-number">STRENGTH IN
					<span style="color: #98eae7">NUMBERS</span>
				</h3>
				<div class="slide-word">Magic Internet Money</div>
				<div class="slide-word">You can't go wrong with the classic</div>
			</div>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0 line-padding-0">
	<form method="GET" action="<?= base_url()?>user_listing/buy/quick_buy" id="quick-buy-form">
		<div class="navbar-static-top col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-header">
			<div class="main-header navbar-custom-menu col-xs-6">
				<!-- Logo -->
				<a id="quick-buy-button" class="logo" style="border-right: 0px">
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg">
						<b>Quick Buy</b>
					</span>
				</a>
				<a href="<?= base_url() ?>user_listing/sell/quick" class="logo" style="border-right: 0px">
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg">
						<b>Quick Sell</b>
					</span>
				</a>
			</div>
		</div>
		<div class="navbar-static-top col-lg-12 col-md-12 col-xs-12 col-sm-12 search-bar col-padding-10">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-50">
				<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 sub-padding">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">Amount</div>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<input type="text" class="form-control input-border" name="amount" placeholder="Amount">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 sub-padding">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">Currency</div>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<input type="text" class="form-control input-border" name="currency" placeholder="Currency" list="currency">
						<datalist id="currency">
							<?php
					foreach ($currency_list as $row) {
						?>
								<option value="<?= $row['currency'] ?>">
									<?php

						}
						?>
						</datalist>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 sub-padding">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">Country</div>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<input type="text" class="form-control input-border" name="country" placeholder="Country">
					</div>
				</div>
			</div>
		</div>
	</form>
	<div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
	<div class="col-lg-10 col-md-10 col-xs-12 col-sm-12 padding-top-10">
	<form action="<?= base_url() ?>user_listing/view_listing" method="GET">
			<div class="col-lg-10 col-md-10 col-xs-10 col-sm-12 padding-top-12">
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
					<select name="advertisement" class="form-control">
						<option value="">Advertisement</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
					<select name="country" class="form-control">
						<option value="">Malaysia</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
					<select name="currency" class="form-control">
						<option value="">Currency</option>
						<?php
					foreach ($currency_list as $row) {
						?>
							<option value="<?= $row['currency'] ?>">
								<?= $row['currency'] ?>
							</option>
							<?php

					}
					?>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 sub-padding">
					<select name="payment_method" class="form-control">
						<option value="">Payment Method</option>
						<option value="Bank Transfer">Bank Transfer</option>
					</select>
			</div>
			</div>
			<div class="col-lg-2 col-md-2 col-xs-10 col-sm-12 padding-top-12">
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
					<input type="submit" class="btn btn-info pull-center search-btn form-control" value="Search">
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
							<th>Credit</th>
							<th>Payment Method</th>
							<th>Limits</th>
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
									<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<div>
										<a href="<?= base_url()?>user/view_profile/<?= $row['user_id']?>"><?= $row["username"] ?></a>
									</div>
									<?php
								if ($row["quick_sell"] == 1) {
									?>
										<div class="quick-seller col-padding-10">quick seller</div>
										<?php

								}
								?>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<div>Trade 429|Rating 98%</div>
									<div class="font-color-user">Average Release Time: 6 mins</div>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["payment_method"] ?>
								</th>
								<th class="font-weight-400" style="padding-top:16px">
									<?= $row["limit_from"] ?>-
										<?= $row["limit_to"] ?> MYR</th>
								<th class="font-weight-400 price-color" style="padding-top:16px">
									<?= $row["price_after"] ?> MYR/BTC</th>
								<th style="padding-top:16px;text-align:center;">
									<a href="<?= base_url() ?>user_listing/buy/<?= $row['user_listing_id'] ?>" class="btn btn-info pull-center line-padding-10 search-btn">BUY <?= $row['crypto'] ?></a>
								</th>
							</tr>
							<?php

					}
					?>
							<!-- <tr>
                                            <th class="font-weight-400">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>tsphkj</div>
                                                <div class="quick-seller col-padding-10">quick seller</div>
                                                <div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 70|Rating 96%</div>
                                                <div class="font-color-user">Average Release Time: 14 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Alipay</th>
                                            <th class="font-weight-400" style="padding-top:16px">500-5000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-400">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>jaingpinmiao</div>
                                                <div></div>
                                                <div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 8|Rating 80%</div>
                                                <div class="font-color-user">Average Release Time: 10 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
                                            <th class="font-weight-400" style="padding-top:16px">3000-20000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>htldyp</div>
                                                <div class="quick-seller col-padding-10">quick seller</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">
                                                <div>Trade 2179|Rating 98%</div>
                                                <div class="font-color-user">Average Release Time: 10 mins</div>
                                            </th>
                                            <th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
                                            <th class="font-weight-400" style="padding-top:16px">30000-100000 MYR</th>
                                            <th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
                                            <th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
                                        </tr> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 padding-top-10"></div>
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0">
		<img src="<?= site_url(); ?>/images/stonegain/stonegain.png" class="col-xs-12 col-padding-0" style="height:100%">
	</div>

</section>
<!-- /.content -->
<script>
	$(document).on('click', "#quick-buy-button", function(e){
		$("#quick-buy-form").submit();
	});
	</script>
