<?php
if (!empty($crypto_wallet)) {
    ?>
	<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Avalable : <?= $crypto_wallet["total_amount"]?> <?= $crypto_wallet["crypto"]?></div>
	<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Frozen Assets : <?= $crypto_wallet["locked_amount"]?> <?= $crypto_wallet["crypto"]?></div>
	<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Total : <?= $crypto_wallet["available_amount"]?> <?= $crypto_wallet["crypto"]?></div>
	<?php

} else {
    ?>
		<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Avalable : 0</div>
		<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Frozen Assets : 0</div>
		<div class="col-lg-3col-md-3col-xs-3 col-sm-3 label-height col-padding-10 font-size-14">Total : 0</div>
		<?php

}
?>
