<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="title">
		<h1 class="main-title">WALLET</h1>
		<h1 class="dummy-title">WALLET</h1>
	</div>
</section>

<!-- Main content -->
<section class="content-with-header col-md-12 hidden-xs hidden-sm no-margin no-padding">
	<div class="col-md-2 col-xs-4 no-margin no-padding content-with-header">
		<div class="col-md-12 col-xs-12 sub-padding no-margin no-padding content-with-header">
			<ul class="nav nav-tabs nav-stacked transaction-menu content-with-header">
				<li class="active">
					<a data-toggle="tab" href="#wallet" class="flex-center">View Wallet</a>
				</li>
				<li>
					<a data-toggle="tab" href="#transaction" class="flex-center">Transaction Log</a>
				</li>
				<!-- <li>
					<a data-toggle="tab" href="#send" class="flex-center">Send Coin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#receive" class="flex-center">Receive Coin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#refund" class="flex-center">Refund</a>
				</li> -->
			</ul>
		</div>
	</div>
	<div class="tab-content">
		<div id="wallet" class="col-md-10 col-xs-8 line-padding-15 content-with-header tab-pane fade in active">
			<div class="col-xs-12">
				<div class="col-md-6 col-xs-12 col-padding-0" style="padding-left:5vw">
					<div class="col-md-12 col-xs-12 sub-height">
						<br>
						<div class="col-md-12 col-xs-12 label-height padding-left-10 margin-bottom-10 font-size-xlarge">Total Balance</div>
						<br>
						<br>
						<br>
						<br>
						<br>
						<?php
					foreach ($crypto_wallet as $row) {
						?>
							<div class="col-md-3 col-xs-3 label-height col-padding-10">
								<?= $row["crypto"] ?>
							</div>
							<div class="col-md-9 col-xs-9 label-height col-padding-5">
								<?= $row["total_amount"] ?>
							</div>
							<?php

					}
					?>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-padding-0" style="padding-left:5vw">
					<div class="col-md-12 col-xs-12 margin-bottom table-height">
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
		</div>
		<div id="transaction" class="col-lg-10 col-md-10 col-xs-8 col-sm-8 line-padding-15 content-with-header tab-pane">
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
		<div id="send" class="col-lg-10 col-md-10 col-xs-8 col-sm-8 line-padding-15 content-with-header tab-pane">
		</div>
		<div id="receive" class="col-lg-10 col-md-10 col-xs-8 col-sm-8 line-padding-15 content-with-header tab-pane">
		</div>
		<div id="refund" class="col-lg-10 col-md-10 col-xs-8 col-sm-8 line-padding-15 content-with-header tab-pane">
		</div>
	</div>
</section>

<section class="hidden-lg hidden-md col-xs-12 col-sm-12 no-margin no-padding">
	<div class="row no-margin no-padding">
		<div class="col-sm-12 no-margin no-padding" style="border-bottom: solid 1px rgba(0,0,0,0.2);">
			<ul class="nav nav-pills">
				<li class="active">
					<a data-toggle="tab" href="#mobile-wallet">View Wallet</a>
				</li>
				<li>
					<a data-toggle="tab" href="#mobile-transaction">Transaction Log</a>
				</li>
				<!-- <li>
					<a data-toggle="tab" href="#mobile-send">Send Coin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#mobile-receive">Receive Coin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#mobile-refund">Refund</a>
				</li> -->
			</ul>
		</div>
		<div class="tab-content col-sm-12" style="overflow-y:scroll;">
			<div id="mobile-wallet" class="tab-pane fade in active">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<br>
						<h4>Total Balance</h4>
						<br>
						<table class="formTable">
							<?php
						foreach ($crypto_wallet as $row) {
							?>
								<tr>
									<td>
										<?= $row["crypto"] ?>
									</td>
									<td>
										<?= $row["total_amount"] ?>
									</td>
								</tr>
								<?php

						}
						?>
						</table>
						<br>
						<table class="table table-striped mobile-table">
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
			<div id="mobile-transaction" class="tab-pane fade">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<br>
						<h4>Transaction Log</h4>
						<br>
						</table>
						<br>
						<table class="table table-striped mobile-table">
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
			<div id="mobile-send" class="tab-pane fade">
			</div>
			<div id="mobile-receive" class="tab-pane fade">
			</div>
			<div id="mobile-refund" class="tab-pane fade">
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
