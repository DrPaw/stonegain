<section class="content-header">
    <h1>User Chat Search</h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>admin_user_chat/search"><i class="fa fa-commenting"></i>User Chat Search</a></li>
    </ol>
</section>
<br>
<section class="content content-backend">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>User Chat</h4>
            </div>
            <div class='panel-body'>
                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Message</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($messages as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url()?>admin_user_chat/details/<?= $row["user_chat_id"]?>"><?= $i ?></a></td>
                                    <td><a href="<?= base_url()?>admin_user_chat/details/<?= $row["user_chat_id"]?>"><?= $row["username"] ?></a></td>
                                    <td><a href="<?= base_url()?>admin_user_chat/details/<?= $row["user_chat_id"]?>"><?php
                                        if ($row['is_image'] == 1) {
                                            ?>
                                            <img src="<?= base_url() . $row["message"] ?>">
                                        <?php
                                    } else {
                                        echo $row["message"];
                                    }
                                    ?></a></td>
                                    <td><a href="<?= base_url()?>admin_user_chat/details/<?= $row["user_chat_id"]?>"><?= $row["created_date"] ?></a></td>
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
                                <th>Message</th>
                                <th>Timestamp</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>