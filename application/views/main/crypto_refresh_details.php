<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
    <?= (!empty($user_crypto[0]["amount"]))? $user_crypto[0]["amount"] : "" ?> remaining
</div>
<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
<?= (!empty($user_crypto[0]["btc_price"]))? $user_crypto[0]["btc_price"] : "" ?> BTC Price
</div>
<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
<?= (!empty($user_crypto[0]["usdt_price"]))? $user_crypto[0]["usdt_price"] : "" ?> USDT Price
</div>