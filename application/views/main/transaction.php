<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="title">
		<h1 class="main-title">TRANSACTIONS</h1>
		<h1 class="dummy-title">TRANSACTIONS</h1>
	</div>
</section>

<!-- Main content -->
<section class="content-with-header col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding">
	<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 no-margin no-padding content-with-header">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding content-with-header">
			<ul class="nav nav-tabs nav-stacked transaction-menu content-with-header">
				<li class="active">
					<a data-toggle="tab" href="#deposit">Deposit</a>
				</li>
				<li>
					<a data-toggle="tab" href="#withdraw">Withdraw</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="line-padding-15 col-lg-10 col-md-10 col-xs-10 col-sm-10 content-with-header">
		<div class="tab-content">
			<div id="deposit" class="tab-pane fade in active">
				<form method="POST" action="<?= base_url() ?>transaction/deposit">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border margin-bottom" style="height:25%;">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding-custom">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10 font-size-large">
								<select class="form-control crypto-select" id="depositCrypto" name="crypto_id" onchange="loadDeposit()">
									<option value="0" >None</option>
									<?php
        foreach ($crypto as $row) {
            ?>
										<option value="<?= $row["crypto"] ?>">
											<?= $row["name"] ?>
										</option>
										<?php

        }
        ?>
								</select>
							</div>
							<div id="refresh-crypto-amount-deposit">
								<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Avalable : 0</div>
								<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Frozen Assets : 0</div>
								<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Total : 0</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-padding-0" style="padding-right:10px;">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border transaction-box-height sub-padding-custom">
							<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Address :</div>
							<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
								<input type="text" class="form-control input-border" value="Please select a currency" id="depositAddress" disabled name="address">
							</div>
							
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10">
                                Please deposit your token to this address 
                                <p>Please ensure the address is correct or else coin will be lost permanently</p>
                            </div>
							
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-padding-0">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border transaction-box-height sub-padding-custom">
							<div class="no-history">No Deposit History</div>
						</div>
					</div>
				</form>
            </div>
            <div id="withdraw" class="tab-pane">
				<form method="POST" action="<?= base_url() ?>transaction/withdraw">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border margin-bottom" style="height:25%;">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding-custom">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10 font-size-large">
								<select class="form-control crypto-select" name="crypto_id">
									<option value="0">None</option>
									<?php
        foreach ($crypto as $row) {
            ?>
										<option value="<?= $row["crypto_id"] ?>">
											<?= $row["name"] ?>
										</option>
										<?php

        }
        ?>
								</select>
							</div>
							<div id="refresh-crypto-amount-withdraw">
								<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Avalable : 0</div>
								<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Frozen Assets : 0</div>
								<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Total : 0</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-padding-0" style="padding-right:10px;">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border transaction-box-height sub-padding-custom">
							<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Address :</div>
							<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
								<input type="text" class="form-control input-border" required name="address">
							</div>
							<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Amount :</div>
							<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
								<input type="number" class="form-control input-border" required name="amount">
							</div>
							<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Payment Password :</div>
							<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
								<input type="password" class="form-control input-border" required name="password">
							</div>
							<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Remark :</div>
							<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 col-padding-5 label-height">
								<input type="text" class="form-control input-border" name="remarks">
							</div>
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10">
								<br>
								<input type="submit" class="btn btn-info pull-right" value="Send">
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-padding-0">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-border transaction-box-height sub-padding-custom">
							<div class="no-history">No Withdraw History</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
<script>
	var crypto_price = 0;

	$(document).on("change", ".crypto-select", function (e) {
		crypto_id = $(this).val();

		postParam = {
			crypto_id: crypto_id
		};

		$.post("<?= site_url('transaction/get_crypto_amount/') ?>", postParam, function (response) {
			$("#refresh-crypto-amount-deposit").html(response);
			$("#refresh-crypto-amount-withdraw").html(response);
		});
	});

    function loadDeposit(){
        var currency = $("#depositCrypto").val();
        $.post("<?= site_url('Transaction/loadDeposit'); ?>",
                {
                    currency: currency
                },
                function(res){
                    console.log(res);
                    $("#depositAddress").val(res.data);
                }, "JSON");
    }

</script>
