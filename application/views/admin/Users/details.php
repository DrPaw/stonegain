<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header admin-panel">
                    <a href="<?= site_url("admin_user/edit/" . $user['user_id']); ?>" class="pull-right a-color-backend">
                        Edit
                    </a>
                    <h4 style="margin-left:20px;" class="pull-left"><?= $user['username']?>'s Info</h4>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#login" data-toggle="tab">Info</a>

                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active backgroundcolor-white" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>Username</th>
                                    <td>: <?= $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: <?= $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>: <?= $user['country']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bank Name</th>
                                    <td>: <?= $user['bank_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Bank Acc. No.</th>
                                    <td>: <?= $user['bank_account_number']; ?></td>
                                </tr>
                                <tr>
                                    <th>Preferred Online / Active Time</th>
                                    <td>: <?= date("h:i:s a", strtotime($user['preferred_time'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Preferred Threshold</th>
                                    <td>: <?= $user['preferred_threshold']; ?></td>
                                </tr>
                                <tr>
                                    <th>Referral Link</th>
                                    <td>: <?= $user['referral_link']; ?></td>
                                </tr>
                                <tr>
                                    <th>Trades</th>
                                    <td>: <?= $user['trades']; ?></td>
                                </tr>
                                <tr>
                                    <th>Rating</th>
                                    <td>: <?= $user['rating']; ?>%</td>
                                </tr>
                                <tr>
                                    <th>Average Release Time</th>
                                    <td>: <?= $user['average_time']; ?></td>
                                </tr>
                                <tr>
                                    <th>Trusted</th>
                                    <td>: <?= $user['trusted']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header admin-panel">
                  
                    <h4 style="margin-left:20px;" class="pull-left">External Transactions</h4>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#BTC" data-toggle="tab">BTC</a>
                               
                            </li>
                            <li >
                                <a href="#ETH" data-toggle="tab">ETH</a>
                            </li>
                            <li >
                                <a href="#LTC" data-toggle="tab">LTC</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active backgroundcolor-white" id="BTC">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Address</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($eTransactions as $row){ 
                                        if( $row['crypto_id'] != 1) continue;
                                        ?>
                                    <tr>
                                        <td><?= $row['created_date']; ?></td>
                                        <td><?= $row['transaction_type']; ?></td>
                                        <td><?= $row['amount']; ?></td>
                                        <td><?= $row['address']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane  backgroundcolor-white" id="ETH">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Address</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($eTransactions as $row){ 
                                        if( $row['crypto_id'] != 2) continue;
                                        ?>
                                    <tr>
                                        <td><?= $row['created_date']; ?></td>
                                        <td><?= $row['transaction_type']; ?></td>
                                        <td><?= $row['amount']; ?></td>
                                        <td><?= $row['address']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane  backgroundcolor-white" id="LTC">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Address</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($eTransactions as $row){
                                        if( $row['crypto_id'] != 5) continue;
                                        ?>
                                    <tr>
                                        <td><?= $row['created_date']; ?></td>
                                        <td><?= $row['transaction_type']; ?></td>
                                        <td><?= $row['amount']; ?></td>
                                        <td><?= $row['address']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header admin-panel">
                    <h4 style="margin-left:20px;" class="pull-left">Trades</h4>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#listing" data-toggle="tab">Listings</a>
                              
                            </li>
                            <li class="">
                                <a href="#buys" data-toggle="tab">Buys</a>
                              
                            </li>
                            <li class="">
                                <a href="#sells" data-toggle="tab">Sells</a>
                              
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active backgroundcolor-white" id="listing">
                            <table class="table table-hover table-stripe">
                                <thead>
                                    <th>Listing ID</th>
                                    <th>Currency</th>
                                    <th>Markup %</th>
                                    <th>Threshold</th>
                                    <th>Amount to sell</th>
                                    <th>Price</th>
                                    <th>Minimum</th>
                                    <th>Maximum</th>
                                </thead>
                             <?php foreach($listing as $row){  ?>
                              
                                <tr>
                                    <td><?= $row['user_listing_id']; ?></td>
                                    <td><?= $row['crypto']; ?></td>
                                    <td><?= $row['markup']; ?></td>
                                    <td><?= $row['threshold']; ?></td>
                                    <td><?= $row['amount']; ?></td>
                                    <td><?= $row['price_after']; ?></td>
                                    <td><?= $row['limit_from']; ?></td>
                                    <td><?= $row['limit_to']; ?></td>
                                </tr>
                             <?php } ?>
                             </table>
                        </div>
                        <div class="tab-pane backgroundcolor-white" id="buys">
                            <table class="table table-hover table-stripe">
                                <thead>
                                    <th>Listing ID</th>
                                    <th>Currency</th>
                                    <th>Markup %</th>
                                    <th>Threshold</th>
                                    <th>Amount to sell</th>
                                    <th>Price</th>
                                    <th>Minimum</th>
                                    <th>Maximum</th>
                                </thead>
                             <?php foreach($listing as $row){  ?>
                             
                             <?php } ?>
                             </table>
                        </div>
                        <div class="tab-pane backgroundcolor-white" id="sells">
                            <table class="table table-hover table-stripe">
                                <thead>
                                    <th>Listing ID</th>
                                    <th>Currency</th>
                                    <th>Markup %</th>
                                    <th>Threshold</th>
                                    <th>Amount to sell</th>
                                    <th>Price</th>
                                    <th>Minimum</th>
                                    <th>Maximum</th>
                                </thead>
                             <?php foreach($listing as $row){  ?>
                              
                                <tr>
                         
                                </tr>
                             <?php } ?>
                             </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        
    </div>
</div>
