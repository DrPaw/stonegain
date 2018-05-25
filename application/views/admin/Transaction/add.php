<form id="user_form" method="POST" action="<?php echo site_url('admin_transaction/add'); ?>">
	<div class="mediumBox">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
				<div class="box box-default">
					<div class="box-header">Add Transaction</div>
					<div class="box-body">
						<div class="alert alert-danger hidden user_form_alert" id="form_alert">

						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
								<label>User Listing</label>
								<select class="form-control" name="user_listing_id" id='form-user-listing-id'>
									<option value="0">None</option>
									<?php
        foreach ($user_listing as $row) {
            ?>
										<option value="<?= $row['user_listing_id'] ?>">
											<?= $row["username"] ?> -
												<?= $row["crypto"] ?>
										</option>
										<?php

        }
        ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
								<label>Buyer</label>
								<select class="form-control" name="buyer_id">
                                    <?php
                                        foreach($users as $row){
                                            ?>
                                            <option value="<?= $row['user_id']?>"><?= $row['username']?></option>
                                            <?php
                                        }
                                    ?>
								</select>
							</div>
						</div>
						<div id="refresh-user-listing-details">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>MYR</label>
									<input type="number" class="form-control" name="myr_amount" required>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>BTC</label>
									<input type="number" class="form-control" name="btc_amount" required>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>Amount Available</label>
									<p>0</p>
								</div>
                            </div>
                            <div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>Price</label>
									<p>0 MYR/BTC</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>Limits</label>
									<p> - MYR</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>Payment Method</label>
									<p></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>Time of Payment</label>
									<p>Minutes</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<label>Message</label>
									<p></p>
								</div>
							</div>
							<input type="submit" class="btn btn-flat btn-info pull-right" id="add-button" value="add" disabled>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	$(document).on('change', '#form-user-listing-id', function () {

		var user_listing_id = $(this).val();

		if (user_listing_id != 0) {

			postParam = {
				user_listing_id: user_listing_id
			};

			$.post("<?= site_url('ajax/load_admin_user_listing') ?>", postParam, function (response) {
				$("#refresh-user-listing-details").html(response);
			});

		} else {
            $('#add-button').prop('disabled', true);
        }

	});
    
    function calculate(index) {
		var myr_amount = $("#myr-amount-form").val();
		var btc_amount = $("#btc-amount-form").val();
		var price = $("#price-after-form").val();
		var amount = $("#amount-form").val();
		var total_price = price * amount;

		if ((index).name === "myr_amount") {
        console.log(myr_amount);
			var new_btc_amount = (myr_amount / total_price) * amount;
			$("#btc-amount-form").val(new_btc_amount);
		} else if ((index).name === "btc_amount") {
			var new_myr_amount = (btc_amount / amount) * total_price;
			$("#myr-amount-form").val(new_myr_amount);

		}

	}

</script>
