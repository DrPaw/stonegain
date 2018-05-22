<section class="content-header padding-15">
    <h1>Transaction</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>transactionList"><i class="fa fa-file"></i>Transaction</a></li>
    </ol>
</section>
<br>
<section class="content content-backend">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Transaction</h4>
            </div>
            <div class="tab-content">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" id="tabs">
                        <li class="active">
                            <a href="#1" data-toggle="tab">Internal</a>
                        </li>
                  
                    </ul>
                </div>
                <div class="tab-pane active backgroundcolor-white" id="1">
                    <div class='panel-heading'>
                        <h4 class="whiteTitle" style='display: inline-block;'>Internal</h4>
                    </div>
                    <div class='panel-body'>
                        <div id="refreshBox">
                            <table id="data-table" class="table table-bordered table-hover data-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Buyer</th>
                                        <th>Seller</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($user_trade as $row) {
                                        ?>
                                        <tr>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $i; ?></a></td>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $row['buyer_name']; ?></a></td>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $row['seller_name']; ?></a></td>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $row['myr_amount']; ?> MYR</a></td>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $row['btc_amount']; ?> BTC</a></td>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $row['created_date']; ?></a></td>
                                            <td><a href="<?= base_url() ?>Admin_transaction/internal/details/<?= $row['user_trade_id'] ?>" class="a-color-backend"><?php echo $row['user_trade_status']; ?></a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>No.</th>
                                        <th>Buyer</th>
                                        <th>Seller</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane backgroundcolor-white" id="2">
                <div class='panel-heading'>
                    <h4 class="whiteTitle" style='display: inline-block;'>External</h4>
                </div>
                <div class='panel-body'>
                    <div id="refreshBox">
                        <table id="data-table" class="table table-bordered table-hover data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($internal as $row) {
                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>transactionList/details/<?= $row['transaction_id'] ?>"><?php echo $i; ?></a></td>
                                        <td><a href="<?= base_url() ?>transactionList/details/<?= $row['transaction_id'] ?>"><?php echo $row['amount']; ?></a></td>
                                        <td><a href="<?= base_url() ?>transactionList/details/<?= $row['transaction_id'] ?>"><?php echo $row['description']; ?></a></td>
                                        <td><a href="<?= base_url() ?>transactionList/details/<?= $row['transaction_id'] ?>"><?php echo $row['remark']; ?></a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Remark</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</section>