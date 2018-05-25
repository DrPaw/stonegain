<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>MYR</label>
		<input type="number" class="form-control" id='myr-amount-form' name="myr_amount" required min="<?= $user_listing['limit_from']?>" max="<?= $user_listing['limit_to'] ?>" onchange="calculate(this)" step="any">
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>BTC</label>
		<input type="number" class="form-control" id='btc-amount-form' name="btc_amount" required onchange="calculate(this)" step="any">
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>Amount Available</label>
		<p>
			<?= $user_listing['amount_available']?>
		</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>Price</label>
		<p>
			<?= $user_listing["price_after"] ?> MYR/BTC</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>Limits</label>
		<p>
			<?= $user_listing["limit_from"] ?> -
				<?= $user_listing["limit_to"] ?> MYR</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>Payment Method</label>
		<p>
			<?= $user_listing["payment_method"] ?>
		</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>Time of Payment</label>
		<p>
			<?= $user_listing["time_of_payment"] ?> Minutes</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<label>Message</label>
		<p>
			<?= $user_listing["message"] ?>
		</p>
	</div>
</div>
<input type="hidden" id="price-after-form" value="<?= $user_listing['price_after']?>">
<input type="hidden" id="amount-form" value="<?= $user_listing['amount']?>">
<input type="hidden" name="seller_id" value="<?= $user_listing['user_id']?>">
<input type="submit" class="btn btn-flat btn-info pull-right" value="add">
