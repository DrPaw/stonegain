<!-- Main content -->
<section class="content col-xs-12">
	<div class="col-xs-12 sub-padding font-weight-bold">
		Select User Listing Type
	</div>
	<div class="col-xs-12 sub-padding border-bottom margin-bottom-10">
		<button type="button" id="buy-button" class="btn btn-default add-listing-button">BUY</button>
		<button type="button" id="sell-button" class="btn btn-default add-listing-button">SELL</button>
	</div>
	<form id="add_user_listing" method="POST" action="<?= base_url() ?>user_listing/add/">
		<div class="col-xs-12 sub-padding border-bottom margin-bottom-10">
			<div class="row" id="refresh-crypto-select">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-md-3 col-xs-4 sub-padding">
							<span class="font-weight-bold">Select crypto</span>
						</div>
						<div class="col-md-9 col-xs-8 sub-padding font-color-user">
							<select id="crypto-select" class="form-control" name="crypto_id">
								<option value="0">None</option>
							</select>
						</div>
					</div>
				</div>
				<div id="crypto-details-refresh" class="col-sm-6">
					<div class="row">
						<div class="col-xs-4 sub-padding">
							Total Balance:
						</div>
						<div class="col-xs-4 sub-padding">
							Locked Amount:
						</div>
						<div class="col-xs-4 sub-padding">
							Available Balance:
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12 no-padding">
			<div class="col-md-6 col-xs-12 no-padding">
				<div class="col-xs-12 sub-padding margin-bottom-10 font-weight-bold">
					User Listing Details
				</div>
				<div class="col-xs-12 sub-padding">
					<div class="col-xs-4 label-height col-padding-10">Amount:</div>
					<div class="col-xs-8 label-height col-padding-5">
						<input id="amount-form" type="number" class="form-control input-border" required name="amount" min="0" step="any" value="0">
					</div>
					<div class="col-xs-4 label-height col-padding-10">Markup Percentage:</div>
					<div class="col-xs-8 label-height col-padding-5">
						<input id="markup-form" type="number" class="form-control input-border" required name="markup" value="0">
					</div>
					<div class="col-xs-4 label-height col-padding-10">Threshold:</div>
					<div class="col-xs-8 label-height col-padding-5">
						<input type="number" class="form-control input-border" required name="threshold" step="any">
					</div>
					<div class="col-xs-4 label-height col-padding-10">Price:</div>
					<div class="col-xs-8 label-height col-padding-5">
						<p id="price-before">0 MYR/BTC</p>
						<input type="hidden" class="form-control input-border" id="price-before-form" name="price_before">
					</div>
					<div class="col-xs-4 label-height col-padding-10">Price (after markup):</div>
					<div class="col-xs-8 label-height col-padding-5">
						<p id="price-after">0 MYR/BTC</p>
						<input type="hidden" class="form-control input-border" id="price-after-form" name="price_after">
					</div>
					<div class="col-xs-4 label-height col-padding-10">Total:</div>
					<div class="col-xs-8 label-height col-padding-5">
						<p id="price-total">0 MYR
							<small>price (after markup) * amount</small>
						</p>
					</div>
					<div class="col-xs-4 label-height col-padding-10">Limit From</div>
					<div class="col-xs-3 label-height col-padding-5">
						<input id="limit-to-form" type="number" class="form-control input-border" step="any" required name="limit_from">
					</div>
					<div class="col-xs-2 label-height col-padding-10 text-center">to</div>
					<div class="col-xs-3 label-height col-padding-5">
						<input id="limit-from-form" type="number" class="form-control input-border" step="any" required name="limit_to">
					</div>
					<div id="sell-requirements">
						<div class="col-xs-4 label-height col-padding-10">Payment Method:</div>
						<div class="col-xs-8 label-height col-padding-5">
							<select class="form-control input-border" name="payment_method">
								<option value="Bank Transfer">Bank Transfer</option>
							</select>
						</div>
						<div class="col-xs-4 label-height col-padding-10">Payment Time (minutes):</div>
						<div class="col-xs-8 label-height col-padding-5">
							<input type="number" class="form-control input-border" required name="time_of_payment" step="1" id="form_time_of_payment">
						</div>
					</div>
					<div class="col-xs-12 label-height col-padding-10 margin-bottom-10 ">
						<input type="submit" class="btn btn-primary pull-right" value="SUBMIT">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-xs-12 sub-padding font-weight-bold">
					Messages
				</div>
				<div class="col-xs-12 sub-padding">
					<textarea class="form-control input-border" rows="10" name="message"></textarea>
				</div>
			</div>
		</div>
	</form>
</section>
<!-- /.content -->
<script>
	var crypto_price = 0;

	$(document).on('click', '#buy-button', function (e) {
		$(this).addClass("btn-danger");
		$('#sell-button').removeClass("btn-success");

		postParam = {
			type: "buy"
		}

		$.post("<?= site_url('ajax/refresh_crypto_select/') ?>", postParam, function (response) {
			$("#refresh-crypto-select").html(response);
		});

		$("#add_user_listing :input").prop("disabled", false);
		$('#sell-requirements').addClass("hidden");
		$("#form_time_of_payment").prop("disabled", true);
	});

	$(document).on('click', '#sell-button', function (e) {
		$(this).addClass("btn-success");
		$('#buy-button').removeClass("btn-danger");

		postParam = {
			type: "sell"
		}

		$.post("<?= site_url('ajax/refresh_crypto_select/') ?>", postParam, function (response) {
			$("#refresh-crypto-select").html(response);
		});

		$("#add_user_listing :input").prop("disabled", false);
		$('#sell-requirements').removeClass("hidden");
		$("#form_time_of_payment").prop("disabled", false);
	});

	$(document).ready(function () {
		$("#add_user_listing :input").prop("disabled", true);
	});

	$(document).on("change", "#crypto-select", function (e) {
		crypto_id = $(this).val();

		postParam = {
			crypto_id: crypto_id,
			user_id: <?= $this->session->userdata("user")["user_id"] ?>
		};
		$.post("<?= site_url('ajax/get_user_crypto_data/') ?>", postParam, function (response) {
			$("#crypto-details-refresh").html(response);
		});

		$.post("<?= site_url('ajax/set_max_amount/') ?>", postParam, function (response) {
			var max = response;
			$("#amount-form").attr({
				"max": max
			});
		});

		$.post("<?= site_url('ajax/get_crypto_price/') ?>", postParam, function (response) {
			crypto_price = response;
			$("#price-before-form").val(crypto_price);
			$("#price-before").text(crypto_price + " MYR/BTC");
			$("#price-before-after").val(0);
			$("#price-after").text("0.00 MYR/BTC");
			$("#amount-form").val(0);
		});

		$("#markup-form").val(0);
	});

	$(document).on("change", "#markup-form, #amount-form", function (e) {
		if (crypto_price != 0) {
			var markup = $("#markup-form").val();
			if (markup <= 0) {
				var crypto_price_after = crypto_price;
			} else {
				var crypto_price_after = parseFloat(crypto_price) + (parseFloat(crypto_price) * parseFloat(markup / 100));
			}
			crypto_price_after = parseFloat(crypto_price_after).toFixed(2);
			var amount = $("#amount-form").val();
			var total = crypto_price_after * amount;
			total = parseFloat(total).toFixed(2);
			$("#price-after-form").val(crypto_price_after)
			$("#price-after").text(crypto_price_after + " MYR/BTC")
			$("#price-total").text(total + " MYR")
			$("#limit-to-form").attr({
				"max": total
			});
			$("#limit-from-form").attr({
				"max": total
			});
		}
	});
</script>