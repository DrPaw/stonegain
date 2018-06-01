<section class="content-header">
    <h1>Top Buyer</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>admin_report/top_buyer"><i class="fa fa-user-circle"></i>Top Buyer</a></li>
    </ol>
</section>
<br>
<section class="content content-backend">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Top Buyer</h4>
            </div>
            <div class='panel-body'>
                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Completed Purchases</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($top_buyer as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>admin_user/details/<?= $row['buyer_id'] ?>" class="a-color-backend"><?php echo $i; ?></a></td>
                                    <td><a href="<?= base_url() ?>admin_user/details/<?= $row['buyer_id'] ?>" class="a-color-backend"><?= $row["username"] ?></a></td>
                                    <td><a href="<?= base_url() ?>admin_user/details/<?= $row['buyer_id'] ?>" class="a-color-backend"><?= $row["total_purchases"] ?></a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Completed Purchases</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).on('click', '.delete-button', function (e) {
        if (confirm("Are you sure you want to delete this admin?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>admin/delete/" + id);
        }
    });
</script>