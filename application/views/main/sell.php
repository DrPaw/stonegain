<!-- Main content -->
<section class="content col-xs-12">
	<form method="POST" action="<?= base_url() ?>user_listing/sell/<?= $user_listing['user_listing_id'] ?>">
		<div class="col-xs-12 sub-padding border-bottom margin-bottom-10">
			<div class="col-sm-6">
				<div class="row">
					<div class="col-md-6 col-xs-12 sub-padding">
						<span class="font-weight-bold">User:</span>
						<?= $user_listing["username"] ?>
					</div>
					<div class="col-xs-12 sub-padding font-color-user">
						<span class="font-weight-bold">Average Release Time:</span>
						<?= $user_listing["average_time"]?> mins
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="col-xs-3 sub-padding">
					<?= $user_listing["trades"]?> Trades
				</div>
				<div class="col-xs-3 sub-padding">
					<?= $user_listing["trusted"]?> Trusted
				</div>
				<div class="col-xs-3 sub-padding">
					<?= $user_listing["rating"]?>% Rating
				</div>
				<div class="col-xs-3 sub-padding">
					<?= $user_listing["amount"] ?>
						<?= $user_listing["crypto"]?> Volume
				</div>
			</div>
		</div>

		<div class="col-md-6 col-xs-12 no-padding no-margin">
			<div class="col-xs-12  sub-padding margin-bottom-10 font-weight-bold">
				Selling Details
			</div>
			<div class="col-xs-12 sub-padding">
				<div class="col-xs-3 label-height col-padding-10">MYR:</div>
				<div class="col-xs-9 label-height col-padding-5">
					<input id="myr-amount-form" type="number" class="form-control input-border" required name="myr_amount" step="any" max="<?=$user_listing['limit_to']?>"
					min="<?=$user_listing['limit_from']?>" onkeyup="calculate(this)">
				</div>
				<div class="col-xs-3 label-height col-padding-10">BTC:</div>
				<div class="col-xs-9 label-height col-padding-5">
					<input id="btc-amount-form" type="number" class="form-control input-border" required name="btc_amount" step="any" min="0" onkeyup="calculate(this)">
				</div>
				<div class="col-xs-3 label-height col-padding-10">Price:</div>
				<div class="col-xs-9 label-height col-padding-5">
					<?= $user_listing["price_after"] ?> MYR/BTC</div>
				<div class="col-xs-3 label-height col-padding-10">Limits:</div>
				<div class="col-xs-9 label-height col-padding-5">
					<?= $user_listing["limit_from"] ?>-
						<?= $user_listing["limit_to"] ?> MYR</div>
				<div class="col-xs-3 label-height col-padding-10">Payment Method:</div>
				<div class="col-xs-9 label-height col-padding-5">
					<select class="form-control input-border" name="payment_method">
						<option value="Bank Transfer">Bank Transfer</option>
					</select>
				</div>
				<div class="col-xs-3 label-height col-padding-10">Time of Payment:</div>
				<div class="col-xs-9 label-height col-padding-5">
					<input type="number" class="form-control input-border" required name="time_of_payment" step="1">
				</div>
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10 margin-bottom-10 ">
					<input type="submit" class="btn btn-primary pull-right" value="SELL" <?php if($this->session->has_userdata("user")){ if($this->session->userdata("user")["user_id"] == $user_listing["user_id"]){ ?> disabled
					<?php
						}
					}
					?>>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
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
				It is strongly recommended that you consider the possible risks and rewards that are associated with the investment and
				trade of CFDs in order to fully understand if this type of investment is right for you. We highly recommend you to speak
				with one of our account representatives before maaking any kind of transactions.
			</div>
		</div>
	</form>
</section>
<!-- /.content -->
<script>
	function calculate(index) {
		var myr_amount = $("#myr-amount-form").val();
		var btc_amount = $("#btc-amount-form").val();
		var price = <?= $user_listing["price_after"] ?>;
		var amount = <?= $user_listing["amount"] ?>;
		var total_price = <?= $user_listing["price_after"] * $user_listing["amount"] ?>;

		if ((index).name === "myr_amount") {
			var new_btc_amount = (myr_amount / total_price) * amount;
			console.log(myr_amount);
			console.log(total_price);
			console.log(amount);
			$("#btc-amount-form").val(new_btc_amount);
		} else if ((index).name === "btc_amount") {
			var new_myr_amount = (btc_amount / amount) * total_price;
			$("#myr-amount-form").val(new_myr_amount.toFixed(2));

		}

	}
</script>