<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 sub-padding">
    Total Balance: <?= (!empty($crypto_wallet["total_amount"]))? $crypto_wallet["total_amount"] : "" ?>
</div>
<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 sub-padding">
    Locked Amount: <?= (!empty($crypto_wallet["locked_amount"]))? $crypto_wallet["locked_amount"] : "" ?>
</div>
<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 sub-padding">
    Available Balance: <?= (!empty($crypto_wallet["available_amount"]))? $crypto_wallet["available_amount"] : "" ?>
</div>