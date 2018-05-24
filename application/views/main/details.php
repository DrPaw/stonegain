<!-- Main content -->
<section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding border-bottom margin-bottom-10">
		<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				<span class="font-weight-bold">User:</span>
				<?= $user_listing["username"] ?>
			</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 sub-padding font-color-user">
				Average Release Time: 0 mins
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				1000+ Trades
			</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				488 Trusted
			</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				98% Rating
			</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				<?= $user_listing["amount"] ?> BTC Volume
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding margin-bottom-10 font-weight-bold">
			Purchase Details
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3label-height col-padding-10">MYR Amount:</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				<?= $user_trade["myr_amount"] ?> MYR</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3label-height col-padding-10">BTC Amount:</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				<?= $user_trade["btc_amount"] ?> BTC</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3label-height col-padding-10">Price:</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				<?= $user_listing["price_after"] ?> MYR/BTC</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3label-height col-padding-10">Limits:</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				<?= $user_listing["limit_from"] ?>-
					<?= $user_listing["limit_to"] ?> MYR</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3label-height col-padding-10">Payment Method:</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				<?= $user_listing["payment_method"] ?>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3label-height col-padding-10">Time of Payment:</div>
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				<?= $user_listing["time_of_payment"] ?> Minutes
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding font-weight-bold">
				Messages
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
				<?= (!empty($user_listing["message"])) ? $user_listing["message"] : "No Messages" ?>
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding padding-top-50 font-weight-bold">
				Notice of Transaction
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
				Trading Currencies and other financial instruments carries risk due to the potential of increased volatility and speculation.
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
		<?php
	if (!empty($user_trade["receipt"])) {
		?>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 font-weight-bold align-center">
				<a href="#img">
					<img class="receipt" src="<?= base_url() . $user_trade['receipt'] ?>">
				</a>
				<form method="POST" action="<?= base_url() ?>user_listing/details/<?= $user_listing['user_listing_id'] ?>/<?= $user_trade['user_trade_id'] ?>"
				enctype="multipart/form-data">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
						<input type="file" name="receipt">
						<input type="hidden" name="upload" value="receipt">
					</div>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
						<input type="submit" class="btn btn-info pull-right" value="Reupload Receipt">
					</div>
				</form>
			</div>
			<?php

	} else {
		?>
				<form method="POST" action="<?= base_url() ?>user_listing/details/<?= $user_listing['user_listing_id'] ?>/<?= $user_trade['user_trade_id'] ?>"
				enctype="multipart/form-data">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 font-weight-bold">
						<h3>Receipt Required</h3>
					</div>
					<?php
				if ($this->session->userdata("user")["user_id"] == $user_trade["buyer_id"]) {
					?>
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
							<input type="file" name="receipt">
							<input type="hidden" name="upload" value="receipt">
						</div>
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
							<input type="submit" class="btn btn-info pull-right" value="Upload Receipt">
						</div>
						<?php

				}
				?>
				</form>
				<?php

		}
		?>
	</div>
</section>
<?php
if (!empty($user_trade["receipt"])) {
	?>
	<a href="#_" class="lightbox" id="img">
		<img src="<?= base_url() . $user_trade['receipt'] ?>">
	</a>
	<?php

}
?>
	<!-- /content -->
	<script>
		function calculate(index) {
			var myr_amount = $("#myr-amount-form").val();
			var btc_amount = $("#btc-amount-form").val();
			var price = <?= $user_listing["price_after"] ?>;
			var amount = <?= $user_listing["amount"] ?>;
			var total_price = <?= $user_listing["price_after"] * $user_listing["amount"] ?>;

			if ((index).name === "myr_amount") {
				var new_btc_amount = (myr_amount / total_price) * amount;
				$("#btc-amount-form").val(new_btc_amount);
			} else if ((index).name === "btc_amount") {
				var new_myr_amount = (btc_amount / amount) * total_price;
				$("#myr-amount-form").val(new_myr_amount);

			}

		}

	</script>
