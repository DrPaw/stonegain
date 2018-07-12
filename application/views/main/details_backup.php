<!-- Main content -->
<section class="content col-xs-12">
	<div class="col-xs-12 sub-padding border-bottom margin-bottom-10">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-md-6 col-xs-12 sub-padding">
					<?php
				if ($this->session->userdata("user")["user_id"] == $user_trade["buyer_id"]) {
					?>
								<span class="font-weight-bold">Seller Name:</span>
								<?= $user_trade["seller"] ?>
							<?php

					} else if ($this->session->userdata("user")["user_id"] == $user_trade["seller_id"]) {
						?>
								<span class="font-weight-bold">Buyer Name:</span>
								<?= $user_trade["buyer"] ?>
							<?php

					}
					?>
				</div>
				<div class="col-xs-12 sub-padding font-color-user">
					<span class="font-weight-bold">Average Release Time:</span>
					<?= $user_listing["average_time"] ?> mins
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="col-xs-3 sub-padding">
				<?= $user_listing["trades"] ?> Trades
			</div>
			<div class="col-xs-3 sub-padding">
				<?= $user_listing["trusted"] ?> Trusted
			</div>
			<div class="col-xs-3 sub-padding">
				<?= $user_listing["rating"] ?>% Rating
			</div>
			<div class="col-xs-3 sub-padding">
				<?= $user_listing["amount"] ?>
					<?= $user_listing["crypto"] ?> Volume
			</div>
		</div>
	</div>

	<div class="col-md-6 col-xs-12 no-padding no-margin">
		<div class="col-xs-12 sub-padding margin-bottom-10 font-weight-bold">
			Purchase Details
		</div>
		<div class="col-xs-12 sub-padding">
			<div class="col-xs-6 label-height col-padding-10">MYR Amount:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= $user_trade["myr_amount"] ?> MYR</div>
			<div class="col-xs-6 label-height col-padding-10"><?= $user_listing["crypto"] ?> Amount:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= $user_trade["btc_amount"] ?> <?= $user_listing["crypto"] ?></div>
			<div class="col-xs-6 label-height col-padding-10">Price:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= $user_listing["price_after"] ?> MYR/BTC</div>
			<div class="col-xs-6 label-height col-padding-10">Limits:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= $user_listing["limit_from"] ?>-
					<?= $user_listing["limit_to"] ?> MYR</div>
			<div class="col-xs-6 label-height col-padding-10">Payment Method:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= (!empty($user_trade["trade_payment_method"])) ? $user_trade["trade_payment_method"] : $user_trade["payment_method"] ?>
			</div>
			<div class="col-xs-6 label-height col-padding-10">Time of Payment:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= (!empty($user_trade["trade_time_of_payment"])) ? $user_trade["trade_time_of_payment"] : $user_trade["time_of_payment"] ?> Minutes
			</div>
			<div class="col-xs-6 label-height col-padding-10">Status:</div>
			<div class="col-xs-6 label-height col-padding-5">
				<?= $user_trade["user_trade_status"] ?>
			</div>
			<?php
		if ($user_trade['user_trade_status_id'] == 4 and empty($user_rating)) {
			?>
				<div class="col-xs-6 label-height col-padding-10">How would you rate this trade?</div>
				<div class="col-xs-6 label-height col-padding-5">
					<a href="<?= base_url() ?>user_listing/rate_trade/<?= $user_trade['user_listing_id'] ?>/<?= $user_trade['user_trade_id'] ?>/good"
					class="btn btn-success">
						<i class="fa fa-thumbs-up"></i>
					</a>
					<a href="<?= base_url() ?>user_listing/rate_trade/<?= $user_trade['user_listing_id'] ?>/<?= $user_trade['user_trade_id'] ?>/bad"
					class="btn btn-danger">
						<i class="fa fa-thumbs-down"></i>
					</a>
				</div>
				<?php

		} else if ($user_trade['user_trade_status_id'] == 4 and !empty($user_rating)) {
			?>
					<div class="col-xs-6 label-height col-padding-10">You rate this trade:</div>
					<div class="col-xs-6 label-height col-padding-5">
						<?= strtoupper($user_rating['rating']) ?>
					</div>
					<?php

			}
			?>
					<div class="col-xs-12 sub-padding font-weight-bold">
						Messages
					</div>
					<div class="col-xs-12 sub-padding">
						<?= (!empty($user_listing["message"])) ? $user_listing["message"] : "No Messages" ?>
					</div>
					<div class="col-xs-12 sub-padding padding-top-50 font-weight-bold">
						Notice of Transaction
					</div>
					<div class="col-xs-12 sub-padding">
						Trading Currencies and other financial instruments carries risk due to the potential of increased volatility and speculation.
					</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-12 no-padding no-margin">
		<?php
	if ($user_trade["user_trade_status_id"] < 3) {
		if (!empty($user_trade["receipt"])) {
			?>
			<div class="col-xs-12 font-weight-bold align-center">
				<a href="#img">
					<img class="receipt" src="<?= base_url() . $user_trade['receipt'] ?>">
				</a>
				<?php
			if ($user_trade["user_trade_status_id"] == 2 and $this->session->userdata("user")["user_id"] == $user_trade["buyer_id"]) {
				?>
					<form method="POST" action="<?= base_url() ?>user_listing/details/<?= $user_listing['user_listing_id'] ?>/<?= $user_trade['user_trade_id'] ?>"
					enctype="multipart/form-data">
						<div class="col-xs-12 sub-padding">
							<input type="file" name="receipt">
							<input type="hidden" name="upload" value="receipt">
						</div>
						<div class="col-xs-12 sub-padding">
							<input type="submit" class="btn btn-primary pull-right" value="Reupload Receipt">
						</div>
					</form>
					<?php

			} else if ($user_trade["user_trade_status_id"] == 2 and $this->session->userdata("user")["user_id"] == $user_trade["seller_id"]) {
				?>
					<div class="col-xs-12 sub-padding">
						<a href="<?= base_url() ?>user_listing/mark_as_paid/<?= $user_trade['user_trade_id'] ?>" class="btn btn-primary pull-right">Mark as Payment Received</a>
					</div>
				<?php

		}
		?>
			</div>
			<?php

	} else {
		?>
				<form method="POST" action="<?= base_url() ?>user_listing/details/<?= $user_listing['user_listing_id'] ?>/<?= $user_trade['user_trade_id'] ?>"
				enctype="multipart/form-data">
					<div class="col-xs-12 font-weight-bold">
						<?php
					if ($this->session->userdata("user")["user_id"] == $user_trade["buyer_id"]) {
						?>
									<h3>Step 2 - Upload Receipt</h3>
								<?php

						} else if ($this->session->userdata("user")["user_id"] == $user_trade["seller_id"]) {
							?>
									<h3>Awaiting Buyer to Upload Receipt</h3>
								<?php

						}
						?>
					</div>
					<?php
				if ($this->session->userdata("user")["user_id"] == $user_trade["buyer_id"]) {
					?>
						<div class="col-xs-12 sub-padding">
							<input type="file" name="receipt">
							<input type="hidden" name="upload" value="receipt">
						</div>
						<div class="col-xs-12 sub-padding">
							<input type="submit" class="btn btn-primary pull-right" value="Upload Receipt">
						</div>
						<?php

				}
				?>
				</form>
				<hr>
				<?php
			if ($user_trade['user_trade_status'] == 1 and $this->session->userdata("user")["user_id"] == $user_trade["buyer_id"]) {
				?>
				<div class="col-xs-12 font-weight-bold">
					<h3>Receipt Required</h3>
				</div>
					<br>
					<br>

					<div class="subscribe" id="paypal-button"></div>
					<?php

			}
		}
	} else if ($user_trade["user_trade_status_id"] == 3){
		?>
		<div class="col-xs-12 font-weight-bold">
			<h3>Payment Completed, Processing Trade</h3>
		</div>
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

		$(document).ready(function () {
			var myr_amount = <?= $user_trade['myr_amount']; ?>;
			console.log(myr_amount);
			paypal.Button.render({

				env: 'sandbox', // Or 'sandbox'

				client: {
					sandbox: 'AQy0kbAHWglyL3QOzSQirh_hOjuGLSzoxS_v-jDSZ6KOcHVeDxUYag9EBdumKkZgTzvdLtuvhJSkMHgQ',
					//production: 'xxxxxxxxx'
				},

				commit: true, // Show a 'Pay Now' button

				payment: function (data, actions) {
					return actions.payment.create({
						payment: {
							transactions: [{
								amount: {
									total: myr_amount,
									currency: 'MYR'
								}
							}]
						}
					});
				},

				onAuthorize: function (data, actions) {
					return actions.payment.execute().then(function (payment) {
						$.post("<?= site_url('Transaction/updateTransaction/' . $user_trade['user_trade_id']); ?>", {

						}, function (res) {
							console.log(res);

							window.location = "<?= site_url('user_listing/details/' . $user_listing['user_listing_id'] . "/" . $user_trade['user_trade_id']); ?>";
						});
					});
				}

			}, '#paypal-button');

		});


		function showThankYou() {
			$(".subscribe").hide();
			$("#thankYou").modal('show');
		}

	</script>
