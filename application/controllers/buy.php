<!-- Main content -->
-
<section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12">
	-
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding border-bottom margin-bottom-10">
		-
		<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				-
				<span class="font-weight-bold">User:</span>
				<?= $user_listing["username"] ?>
					- </div>
			-
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 sub-padding font-color-user">
				- Average Release Time: 0 mins - </div>
			- </div>
		-
		<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				- 1000+ Trades - </div>
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				- 488 Trusted - </div>
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				- 98% Rating - </div>
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
				-
				<?= $user_listing["amount"] ?> BTC Volume - </div>
			- </div>
		- </div>
	- -
	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
		-
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding margin-bottom-10 font-weight-bold">
			- Purchase Details - </div>
		-
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">MYR</div>
			-
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				-
				<input type="text" class="form-control input-border" required name="MYR"> - </div>
			-
			<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">BTC</div>
			-
			<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
				-
				<input type="text" class="form-control input-border" required name="BTC"> - </div>
			-
			<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 label-height col-padding-10">Price:</div>
			-
			<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8 label-height col-padding-5">
				<?= $user_listing["price_after"] ?> MYR/BTC</div>
			-
			<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 label-height col-padding-10">Limits:</div>
			-
			<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8 label-height col-padding-5">
				<?= $user_listing["limit_from"] ?>-
					<?= $user_listing["limit_to"] ?> MYR</div>
			-
			<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 label-height col-padding-10">Payment Method:</div>
			-
			<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8 label-height col-padding-5">
				<?= $user_listing["payment_method"] ?>
			</div>
			-
			<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 label-height col-padding-10">Time of Payment:</div>
			-
			<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8 label-height col-padding-5">
				<?= $user_listing["time_of_payment"] ?>
			</div>
			-
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10 margin-bottom-10 ">
				-
				<input type="submit" class="btn btn-info pull-right" value="BUY"> - </div>
			- </div>
		- </div>
	-
	<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
		-
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding font-weight-bold">
			- Messages - </div>
		-
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
			-
			<?= (!empty($user_listing["message"])) ? $user_listing["message"] : "No Messages" ?>
				- </div>
		-
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding padding-top-50 font-weight-bold">
			- Notice of Transaction - </div>
		-
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
			- Trading Currencies and other financial instruments carries risk due to the potential of increased volatility and speculation.
			- </div>
		- </div>
	- </section>
-
<!-- /.content -->
