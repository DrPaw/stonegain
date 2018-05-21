<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="title">
		<h1 class="main-title">WALLET</h1>
		<h1 class="dummy-title">WALLET</h1>
	</div>
</section>

<!-- Main content -->
<section class="content-with-header col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding">
	<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 no-margin no-padding content-with-header">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding no-margin no-padding content-with-header">
			<ul class="nav nav-tabs nav-stacked wallet-menu content-with-header">
				<li class="active">
					<a data-toggle="tab" href="#wallet">View Wallet</a>
				</li>
				<li>
					<a data-toggle="tab" href="#transaction">Transaction Log</a>
				</li>
				<li>
					<a data-toggle="tab" href="#send">Send Coin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#receive">Receive Coin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#refund">Refund</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="tab-content">
		<div id="wallet" class="col-lg-10 col-md-10 col-xs-10 col-sm-10 line-padding-15 content-with-header tab-pane fade in active">
			<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-padding-0 content-with-header" style="padding-left:5vw">
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-height">
					<br>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height padding-left-10 margin-bottom-10 font-size-xlarge">Total Balance</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<?php
    foreach ($crypto_wallet as $row) {
        ?>
						<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">
							<?= $row["crypto"] ?>
						</div>
						<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
							<?= $row["total_amount"] ?>
						</div>
						<?php

    }
    ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 col-padding-0" style="padding-right:10px">
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 margin-bottom table-height">
					<table class="table wallet-table">
						<thead>
							<tr>
								<td>Partner</td>
								<td>Available Balance</td>
								<td>Lock</td>
							</tr>
						</thead>
						<tbody>
							<?php
        foreach ($crypto_wallet as $row) {
            ?>
								<tr>
									<td>
										<?= $row["crypto"] ?>
									</td>
									<td>
										<?= $row["available_amount"] ?>
									</td>
									<td>
										<?= $row["locked_amount"] ?>
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
		<div id="transaction" class="col-lg-10 col-md-10 col-xs-10 col-sm-10 line-padding-15 content-with-header tab-pane">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 col-padding-0 content-with-header" style="padding-left:5vw">
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-height">
					<br>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height padding-left-10 margin-bottom-10 font-size-xlarge">Transaction Log</div>
					<br>
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 margin-bottom table-height">
						<table class="table transaction-table">
							<thead>
								<tr>
									<td>Crypto</td>
									<td>Amount</td>
									<td>Type</td>
									<td>Time</td>
								</tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($transaction as $row) {
                                ?>
							<tr>
								<td>
									<?= $row["crypto"] ?>
								</td>
								<td>
									<?= $row["amount"] ?>
								</td>
								<td>
									<?= $row["transaction_type"] ?>
								</td>
								<td>
									<?= $row["created_date"] ?>
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
		</div>
		<div id="send" class="col-lg-10 col-md-10 col-xs-10 col-sm-10 line-padding-15 content-with-header tab-pane">
		</div>
		<div id="receive" class="col-lg-10 col-md-10 col-xs-10 col-sm-10 line-padding-15 content-with-header tab-pane">
		</div>
		<div id="refund" class="col-lg-10 col-md-10 col-xs-10 col-sm-10 line-padding-15 content-with-header tab-pane">
		</div>
	</div>
</section>
<!-- /.content -->
