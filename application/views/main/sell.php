
                <!-- Main content -->
                <form method="POST" action="<?= base_url()?>user_listing/sell">
                    <section class="content col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding border-bottom margin-bottom-10">
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                    <span class="font-weight-bold">Select your crypto</span>
                                </div>
                                <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 sub-padding font-color-user">
                                    <select id="crypto-select" class="form-control" name="user_crypto_id">
                                        <option value="0">None</option>
                                        <?php
                                            foreach($user_crypto as $row){
                                                ?>
                                                <option value="<?= $row["user_crypto_id"] ?>"><?= $row["crypto"]?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div id="crypto-details-refresh" class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                remaining
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                BTC Price
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 sub-padding">
                                USDT Price
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding margin-bottom-10 font-weight-bold">
                                Selling Details
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Markup Percentage:</div>
                                    <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
                                        <input id="markup-form" type="number" class="form-control input-border" required name="markup">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Threshold:</div>
                                    <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
                                        <input type="number" class="form-control input-border" required name="threshold">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Price:</div>
                                    <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
                                        <p id="price-before">0 MYR/BTC</p>
                                        <input type="hidden" class="form-control input-border" id="price-before-form" name="price_before">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Price (after markup):</div>
                                    <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
                                        <p id="price-after">0 MYR/BTC</p>
                                        <input type="hidden" class="form-control input-border" id="price-after-form" name="price_after">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Limit From</div>
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 label-height col-padding-5">
                                        <input type="number" class="form-control input-border" required name="limit_from">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-xs-1 col-sm-1 label-height col-padding-10">to</div>
                                    <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 label-height col-padding-5">
                                        <input type="number" class="form-control input-border" required name="limit_to">
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Payment Method:</div>
                                    <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
                                        <select class="form-control input-border" name="payment_method">
                                            <option value="Bank Transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 label-height col-padding-10">Payment Time:</div>
                                    <div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 label-height col-padding-5">
                                        <input type="text" class="form-control input-border" required name="time_of_payment">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 label-height col-padding-10 margin-bottom-10 ">
                                        <input type="submit" class="btn btn-info pull-right" value="SELL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding font-weight-bold">
                                Messages
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 sub-padding">
                                    <textarea class="form-control input-border" rows="10" name="message"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
                <!-- /.content -->
                <script>
                    var crypto_price = 0;

                    $(document).on("change", "#crypto-select", function(e){
                        user_crypto_id = $(this).val();

                        postParam = {
                            user_crypto_id: user_crypto_id
                        };
                        $.post("<?= site_url('user/get_user_crypto_data/')?>", postParam, function (response) {
                            $("#crypto-details-refresh").html(response);
                        });

                        $.post("<?= site_url('user/get_user_crypto_price/')?>", postParam, function (response) {
                            crypto_price = response;
                            $("#price-before-form").val(crypto_price)
                            $("#price-before").text(crypto_price + " MYR/BTC")
                        });

                        $("#markup-form").val("");
                    });

                    $(document).on("change", "#markup-form", function(e){
                        if(crypto_price != 0){
                            var crypto_price_after = (parseInt(crypto_price) + parseInt((crypto_price * ($(this).val() / 100)))).toFixed(2);
                            $("#price-after-form").val(crypto_price_after)
                            $("#price-after").text(crypto_price_after + " MYR/BTC")
                        }
                    });
                </script>
            