<div class="no-record-wrapper">
	<h2>You are not eligible for this trade. Please check your wallet.</h2>
	<br/>
	<div class="">
		<a href="<?= base_url() ?>user_listing/view_buy_listing?advertisement=&country=&currency=<?= $crypto ?>&payment_method=" class="btn btn-primary cannot-trade-btn">Buy <?= $crypto?></a>
		<a href="<?= base_url() ?>transaction" class="btn btn-primary cannot-trade-btn">Deposit</a>
	</div>
</div>